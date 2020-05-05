<?php
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this
// file, You can obtain one at http://mozilla.org/MPL/2.0/.

// == | Setup | =======================================================================================================

const SITE_NAME = 'Pale Moon - Developer Site';
const SKIN = 'palemoon';

// This array constant holds the site map (for lack of a better term)
// Do mind the commas.
// Syntax: '/url/' => ['content-filename-without-extension', 'Page Title/Main Heading']
// The third index is a temporary flag to indicate that content should be there but I haven't ported it yet....
const CONTENT = array(
  // Root Index
  '/'                                         => ['root-index', 'Welcome to the Pale Moon Developer Site'],

  // Build Documentation
  '/build/'                                   => ['build-index','Building Pale Moon'],
  '/build/windows/'                           => ['build-windows', 'Building Pale Moon: Microsoft Windows'],
  '/build/linux/'                             => ['build-linux', 'Building Pale Moon: GNU Linux'],
  '/build/mac/'                               => ['build-mac', 'Building Pale Moon: Apple Macintosh'],
  '/build/sunos/'                             => ['build-sunos', 'Building Pale Moon: SunOS-based Systems'],

  // Add-ons
  '/addons/'                                  => ['addons-index', 'Add-ons', true],
  '/addons/resources/'                        => ['addons-resources', 'Add-ons: Resources', true],
  '/addons/resources/install-manifest/'       => ['addons-resources-install-manifest', 'Add-ons: Install Manifest', true],
  '/addons/extensions/'                       => ['addons-extensions', 'Add-ons: Extensions', true],
  '/addons/extensions/jetpack/'               => ['addons-extensions-jetpack', 'Add-ons: Jetpack Style Extensions', true],
  '/addons/themes/'                           => ['addons-themes', 'Add-ons: Themes', true],
  '/addons/themes/complete/'                  => ['addons-themes-complete', 'Add-ons: Complete Themes', true],
  '/addons/themes/personas/'                  => ['addons-themes-personas', 'Add-ons: Personas (Lightweight Themes),', true],
  '/addons/themes/pm-history/'                => ['addons-themes-pmhistory', 'Add-ons: Pale Moon Theme History', true],
  '/addons/site/'                             => ['addons-site', 'Add-ons: Site'],
  '/addons/site/phoebus-code/'                => ['addons-site-phoebus-code', 'Add-ons: Phoebus Code Syntax'],
);

// This constant array contains old wiki URLs (accounting for the fact that we add / to non-file.ext urls here)
const WIKI_URLS = array(
  '/Main_Page/' => '/',
  '/Developer_Guide/' => '/',
  '/Developer_Guide:Build_Instructions/'                    => '/build/',
  '/Developer_Guide:Build_Instructions/Pale_Moon/'          => '/build/',
  '/Developer_Guide:Build_Instructions/Pale_Moon/Windows/'  => '/build/windows/',
  '/Developer_Guide:Build_Instructions/Pale_Moon/Linux/'    => '/build/linux/',
  '/Developer_Guide:Build_Instructions/Pale_Moon/macOS/'    => '/build/mac/',
  '/Add-ons/'                                               => '/addons/',
  '/Add-ons:Extensions/'                                    => '/addons/extensions/',
  '/Add-ons:Extensions/Toolkit/'                            => '/addons/extensions/',
  '/Add-ons:Extensions/Bootstrap/'                          => '/addons/extensions/',
  '/Add-ons:Extensions/Jetpack/'                            => '/addons/extensions/jetpack/',
  '/Add-ons:Themes/'                                        => '/addons/themes/',
  '/Add-ons:Themes/Complete/'                               => '/addons/themes/complete/',
  '/Add-ons:Themes/Complete/Changes/'                       => '/addons/themes/pm-history/',
  '/Add-ons:Themes/Persona/'                                => '/addons/themes/personas/',
  '/Add-ons:Site/'                                          => '/addons/site/',
  '/Add-ons:Site/Submit/'                                   => '/addons/site/',
  '/Add-ons:Site/Manifest_Files/'                           => '/addons/site/phoebus-code/',
  
);

require_once(MODULES['content']);

// ====================================================================================================================

// == | Main | ========================================================================================================

// If the URL is known to us pass it to generateContent
if (array_key_exists($gaRuntime['requestPath'], CONTENT)) {
  generateContent($gaRuntime['requestPath']);
}

// This will handle translation from the wiki urls to the new urls
if (array_key_exists($gaRuntime['requestPath'], WIKI_URLS)) {
  gfRedirect(WIKI_URLS[$gaRuntime['requestPath']]);
}

// No idea what we should do so 404
gfHeader(404);

// ====================================================================================================================

?>
