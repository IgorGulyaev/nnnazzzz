Readme
------

This modules enables integration for the Moxicode TinyMCE plugin MCimagemanager 
http://tinymce.moxiecode.com/enterprise/mcimagemanager.php

Installation
------------

1. Create a directory in your Drupal libraries directory (probably
   sites/all/libraries/) called imagemanager and copy all of the module's
   files into it.

2. To enable Drupal authentication for the plugin edit sites/all/libraries/config.php 
  
   Change $mcImageManagerConfig['authenticator'] = "DrupalAuthenticator";
     
   Change $mcImageManagerConfig['filesystem.rootpath'] to point to you default files folder
   Ex. 
   $mcImageManagerConfig['filesystem.rootpath'] = '../../../default/files';

   Depending on your webserver configuration you may also need to change  
   $mcImageManagerConfig['preview.wwwroot'] to your drupalroot filesystem path. 
   See http://tinymce.moxiecode.com/wiki.php/MCFileManager:preview.wwwroot


3. Go to the Modules administration page (admin/modules), and enable the
   TinyMCE MCimagemanager module

4. Go to permissions page (admin/people/permissions) and configure the 
    permission TinyMCE MCImageManager for the roles that should be able to access
    this plugin. 

5. Enable the button (MCImageManager) for your selected inputformats under 
    admin/config/content/wysiwyg. 
    
 
 Plugin configuration
 --------------------
 
 You may need to change the conf