import './bootstrap';

import Alpine from 'alpinejs';
import 'datatables.net';
import 'datatables.net-dt/css/dataTables.dataTables.css'
import '@fortawesome/fontawesome-free/css/all.min.css'

window.Alpine = Alpine;

Alpine.start();

setTimeout(() => {
    const successAlert = document.getElementById('success-alert');
    const errorAlert = document.getElementById('error-alert');

    if (successAlert) {
        successAlert.style.transition = 'opacity 0.5s ease';
        successAlert.style.opacity = '0';
        setTimeout(() => successAlert.remove(), 500);
    }

    if (errorAlert) {
        errorAlert.style.transition = 'opacity 0.5s ease';
        errorAlert.style.opacity = '0';
        setTimeout(() => errorAlert.remove(), 500);
    }
}, 3000);

$(document).ready(function() {
    $('#companiesTable').DataTable({
       //
    });
});

$(document).ready(function() {
    $('#employeesTable').DataTable({
        //
    });
});


