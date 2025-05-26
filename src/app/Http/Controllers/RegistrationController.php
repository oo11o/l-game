<?php

namespace App\Http\Controllers;

use App\Service\Contracts\RegistrationServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class RegistrationController extends Controller
{
    public function __construct(private RegistrationServiceInterface $registrationService)
    {
    }

    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'username' => 'required|string|min:4|max:155',
                'phonenumber' => 'required|regex:/^[0-9]{6,20}$/'
            ]);

            try {
                $slug = $this->registrationService
                    ->generatePageLink($validated['username'], $validated['phonenumber']);
            } catch (QueryException $e) {
                if ($e->getCode() === '23000') { //Duplicate
                    return back()->withErrors([
                        'general' => 'Username and Phonenumber  do not match previously provided data.'
                    ]);
                }
            } catch (\RuntimeException $e) {
                abort(500);
            }

            return view('registration.index', compact('slug'));
        }

        return view('registration.index');
    }
}
