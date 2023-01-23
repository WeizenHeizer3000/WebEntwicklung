<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $loginueberpruefen = [
        'email' => 'required|valid_email',
        'passwort' => 'required',
        'agbs' => 'required'];

    public $loginueberpruefen_errors = [
        'email' => ['required' => 'Bitte tragen Sie eine E-Mail ein.',
            'valid_email' => 'Ihre E-Mail ist ungültig.'],
        'passwort' => ['required' => 'Bitte tragen Sie ein gültiges Passwort ein.'],
        'agbs' => ['required' => 'Sie müssen den AGBs zustimmen!']
    ];

    public $reiterbearbeiten = [
        'name' => 'required',
        'beschreibung' => 'required'
    ];

    public $reiterbearbeiten_errors = [
        'name' => ['required' => 'Bitte tragen Sie einen Namen ein.'],
        'beschreibung' => ['required' => 'Bitte tragen Sie eine Beschreibung ein.']
    ];

    public $mitgliederbearbeiten = [
        'username' => 'required',
        'email' => 'required|valid_email',
        'passwort' => 'required'
        ];

    public $mitgliederbearbeiten_errors = [
        'username' => ['required' => 'Bitte tragen Sie einen Usernamen ein.'],
        'email' => ['required' => 'Bitte tragen Sie eine E-mail ein.',
            'valid_email' => 'Ihre E-Mail ist ungültig.'],
        'passwort' => ['required' => 'Bitte tragen Sie ein Passwort ein.']
    ];

    public $projektebearbeiten = [
        'name' => 'required',
        'beschreibung' => 'required',
    ];

    public $projektebearbeiten_errors = [
        'name' => ['required' => 'Bitte tragen Sie einen Namen ein.'],
        'beschreibung' => ['required' => 'Bitte tragen Sie eine Beschreibung ein.']
    ];
}
