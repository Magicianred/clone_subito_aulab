const Dropzone = require('dropzone');

require('./bootstrap');



require('./scripts');

window.Dropzone=require('dropzone');
Dropzone.autoDiscover=false;

require('./announcementImages');