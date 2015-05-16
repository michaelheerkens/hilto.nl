<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'put your license key here');
c::set('lang.support', true);
c::set('lang.default', 'en');
c::set('lang.available', array('en', 'de'));
c::set('lang.detect', true);
c::set('email.use', 'mailgun');
c::set('email.postmark.key', 'ac89bdf1-7d2e-46ba-a9a7-5b9cb670fb71');
c::set('email.mailgun.key', 'key-6cddd9a652b4c975f130078ac2faf99d');
c::set('email.mailgun.domain', 'allblue.nl');

//c::set('debug', true);
/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/
