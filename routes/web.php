<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/Route::get('/', function (\Codedge\Updater\UpdaterManager $updater) {

    // Check if new version is available
    if($updater->source()->isNewVersionAvailable()) {

        // Get the current installed version
        echo $updater->source()->getVersionInstalled();

        // Get the new version available
        $versionAvailable = $updater->source()->getVersionAvailable();

        // Create a release
        $release = $updater->source()->fetch($versionAvailable);

        // Run the update process
        $updater->source()->update($release);

    } else {
        echo "No new version available.";
    }

});
