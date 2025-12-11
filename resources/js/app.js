import './bootstrap';

// 2. DEPENDENCIAS: jQuery UI (JS y CSS)
import 'jquery-ui/dist/jquery-ui.js'; 
import 'jquery-ui/dist/themes/base/jquery-ui.min.css'; 

// 3. LIBRERÍA PRINCIPAL: JTable
import 'jtable/lib/themes/metro/blue/jtable.min.css';
import 'jtable/jquery.jtable.js'; 

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept': 'application/json'
    }
});