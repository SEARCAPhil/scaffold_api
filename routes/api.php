<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/** CUSTOM AUTH */
Route::post('auth/o365', 'AppsController@authService');

/**
 * Contact
 */
Route::post('contact', 'Contact\PersonalInfo@createService')->middleware('O365');
Route::delete('contact/{id}', 'Contact\PersonalInfo@deleteService')->middleware('O365');
Route::put('contact', 'Contact\PersonalInfo@updateService')->middleware('O365');
Route::get('contact', 'Contact\PersonalInfo@retrieveService')->middleware('O365');
Route::get('contact/{id}/info', 'Contact\PersonalInfo@infoService')->middleware('O365');
Route::get('contact/search/{param}', 'Contact\PersonalInfo@searchService')->middleware('O365');
Route::post('contact/photo', 'Contact\PersonalInfo@photoService')->middleware('O365');



/**
 * Contact\Employment
 */
Route::post('contact/employment', 'Contact\EmploymentController@createService')->middleware('O365');
Route::delete('contact/employment/{id}', 'Contact\EmploymentController@deleteService')->middleware('O365');
Route::put('contact/employment', 'Contact\EmploymentController@updateService')->middleware('O365');
Route::get('contact/employment/{contactId}', 'Contact\EmploymentController@retrieveService')->middleware('O365');
Route::get('contact/employment/{employId}/details', 'Contact\EmploymentController@viewService')->middleware('O365');


/**
 * Contact\Communication
 */
Route::post('contact/communication', 'Contact\CommunicationController@createService')->middleware('O365');
Route::put('contact/communication', 'Contact\CommunicationController@updateService')->middleware('O365');
Route::delete('contact/communication/{id}', 'Contact\CommunicationController@deleteService')->middleware('O365');
Route::get('contact/communication/{id}', 'Contact\CommunicationController@retrieveService')->middleware('O365');


/**
 * Contact\Conference
 */
Route::post('contact/conference', 'Contact\ConferenceController@createService')->middleware('O365');
Route::put('contact/conference', 'Contact\ConferenceController@updateService')->middleware('O365');
Route::delete('contact/conference/{id}', 'Contact\ConferenceController@deleteService')->middleware('O365');
Route::get('contact/conference/{id}', 'Contact\ConferenceController@retrieveService')->middleware('O365');
Route::get('contact/conference/{id}/details', 'Contact\ConferenceController@viewService')->middleware('O365');


/**
 * Contact\Conference\Lecture
 */
Route::post('contact/conference/lecture', 'Contact\Conference\LectureController@createService')->middleware('O365');
Route::put('contact/conference/lecture', 'Contact\Conference\LectureController@updateService')->middleware('O365');
Route::delete('contact/conference/lecture/{id}', 'Contact\Conference\LectureController@deleteService')->middleware('O365');
Route::get('contact/conference/lecture/{id}', 'Contact\Conference\LectureController@retrieveService')->middleware('O365');
Route::get('contact/conference/lecture/{id}/details', 'Contact\Conference\LectureController@viewService')->middleware('O365');



/**
 * Contact\Education
 */
Route::post('contact/education', 'Contact\EducationController@createService')->middleware('O365');
Route::put('contact/education', 'Contact\EducationController@updateService')->middleware('O365');
Route::delete('contact/education/{id}', 'Contact\EducationController@deleteService')->middleware('O365');
Route::get('contact/education/{id}', 'Contact\EducationController@retrieveService')->middleware('O365');
Route::get('contact/education/{id}/details', 'Contact\EducationController@viewService')->middleware('O365');


/**
 * Contact\Engagement
 */
Route::post('contact/engagement', 'Contact\EngagementController@createService')->middleware('O365');
Route::put('contact/engagement', 'Contact\EngagementController@updateService')->middleware('O365');
Route::delete('contact/engagement/{id}', 'Contact\EngagementController@deleteService')->middleware('O365');
Route::get('contact/engagement/{id}', 'Contact\EngagementController@retrieveService')->middleware('O365');
Route::get('contact/engagement/{id}/details', 'Contact\EngagementController@viewService')->middleware('O365');


/**
 * Contact\Fellow
 */
Route::post('contact/fellow', 'Contact\FellowController@createService')->middleware('O365');
Route::put('contact/fellow', 'Contact\FellowController@updateService')->middleware('O365');
Route::delete('contact/fellow/{id}', 'Contact\FellowController@deleteService')->middleware('O365');
Route::get('contact/fellow/{id}', 'Contact\FellowController@retrieveService')->middleware('O365');
Route::get('contact/fellow/{id}/details', 'Contact\FellowController@viewService')->middleware('O365');


/**
 * Contact\Prefix
 */
Route::post('contact/prefix', 'Contact\PrefixController@createService')->middleware('O365');
Route::put('contact/prefix', 'Contact\PrefixController@updateService')->middleware('O365');
Route::delete('contact/prefix/{id}', 'Contact\PrefixController@deleteService')->middleware('O365');
Route::get('contact/prefix', 'Contact\PrefixController@retrieveService')->middleware('O365');


/**
 * Contact\Research
 */
Route::post('contact/research', 'Contact\ResearchController@createService')->middleware('O365');
Route::put('contact/research', 'Contact\ResearchController@updateService')->middleware('O365');
Route::delete('contact/research/{id}', 'Contact\ResearchController@deleteService')->middleware('O365');
Route::get('contact/research/{id}', 'Contact\ResearchController@retrieveService')->middleware('O365');
Route::get('contact/research/{id}/details', 'Contact\ResearchController@viewService')->middleware('O365');


/**
 * Contact\training
 */
Route::post('contact/training', 'Contact\TrainingController@createService')->middleware('O365');
Route::put('contact/training', 'Contact\TrainingController@updateService')->middleware('O365');
Route::delete('contact/training/{id}', 'Contact\TrainingController@deleteService')->middleware('O365');
Route::get('contact/training/{id}', 'Contact\TrainingController@retrieveService')->middleware('O365');
Route::get('contact/training/{id}/details', 'Contact\TrainingController@viewService')->middleware('O365');


/**
 * Saff\Classes
 */
Route::post('saaf/class', 'Saaf\ClassController@createService')->middleware('O365');
Route::put('saaf/class', 'Saaf\ClassController@updateService')->middleware('O365');
Route::delete('saaf/class/{id}', 'Saaf\ClassController@deleteService')->middleware('O365');
Route::get('saaf/class', 'Saaf\ClassController@retrieveService')->middleware('O365');
Route::GET('saaf/class/{id}', 'Saaf\ClassController@viewSubsService')->middleware('O365');

/**
 * Afftype
 */
Route::get('afftype', 'AffTypeController@retrieve')->middleware('O365');

/**
 * Sector
 */
Route::post('sector', 'SectorController@createService')->middleware('O365');
Route::put('sector', 'SectorController@updateService')->middleware('O365');
Route::delete('sector/{id}', 'SectorController@deleteService')->middleware('O365');
Route::get('sector', 'SectorController@retrieveService')->middleware('O365');


/**
 * Trainees
 */
Route::post('trainees', 'TraineesController@createService')->middleware('O365');
Route::put('trainees', 'TraineesController@updateService')->middleware('O365');
Route::delete('trainees/{id}', 'TraineesController@deleteService')->middleware('O365');
Route::get('trainees/{id}', 'TraineesController@retrieveService')->middleware('O365');

/**
 * Contact\Filter\Graduate
 */
Route::get('contact/filter/graduate', 'Contact\Filter\GraduateController@retrieveService')->middleware('O365');
Route::get('contact/filter/graduate/search/{param}', 'Contact\Filter\GraduateController@searchService')->middleware('O365');

/**
 * Contact\Filter\Engage
 */
Route::get('contact/filter/engagement', 'Contact\Filter\EngagementController@retrieveService')->middleware('O365');
Route::get('contact/filter/engagement/search/{param}', 'Contact\Filter\EngagementController@searchService')->middleware('O365');

/**
 * Contact\Filter\Fellow
 */
Route::get('contact/filter/fellowship', 'Contact\Filter\FellowshipController@retrieveService')->middleware('O365');
Route::get('contact/filter/fellowship/search/{param}', 'Contact\Filter\FellowshipController@searchService')->middleware('O365');

/**
 * Contact\Filter\Training
 */
Route::get('contact/filter/training', 'Contact\Filter\TrainingController@retrieveService')->middleware('O365');
Route::get('contact/filter/training/search/{param}', 'Contact\Filter\TrainingController@searchService')->middleware('O365');

/**
 * Country
 */
Route::get('country', 'CountryController@retrieveService')->middleware('O365');

/**
 * Reports
 */

Route::get('reports/directory/country', 'Reports\SaafCountryController@retrieveService');

Route::get('affiliate/hint', 'Contact\PersonalInfo@get_affiliate_contact_hint_service');