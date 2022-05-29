window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {
}

import'admin-lte/plugins/jquery/jquery.min.js';
import'admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js';
import'admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js';
import'admin-lte/plugins/datatables/jquery.dataTables.min.js';
import'admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js';
import'admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js';
import'admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js';
import'admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js';
import'admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js';

import'admin-lte/plugins/jszip/jszip.min.js';
import'admin-lte/plugins/pdfmake/pdfmake.min.js';
import'admin-lte/plugins/pdfmake/vfs_fonts.js';

import'admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js';
import'admin-lte/plugins/datatables-buttons/js/buttons.print.min.js';
import'admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js';

import'admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js';
import'admin-lte/plugins/bootstrap/js/bootstrap.min.js';
import'admin-lte/plugins/datatables-select/js/dataTables.select.min.js';

import'admin-lte/plugins/jquery/jquery.min.js';
import'admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js';
import'admin-lte/plugins/select2/js/select2.full.min.js';

import'admin-lte/plugins/daterangepicker/daterangepicker.js';
import'admin-lte/plugins/jquery-ui/jquery-ui.js';
import'admin-lte/dist/js/adminlte.min.js';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
