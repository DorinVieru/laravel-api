import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import DataTable from 'datatables.net-dt';
import.meta.glob([
    '../img/**'
])

if (document.getElementById('cover_image') != null){
    document.getElementById('cover_image').addEventListener('change', function(){
        let file = this.files[0];
        document.getElementById('preview-image').src = URL.createObjectURL(file);
    })
}

// DATA TABLE PROJECT
let table_project = new DataTable('#table-project', {
    responsive: true,
    language: {
        url: '/it-IT.json',
    },
    "columns": [
        {
            "sortable": true
        },
        {
            "sortable": true
        },
        {
            "sortable": true
        },
        {
            "sortable": true
        },
        {
            "sortable": true
        },
        {
            "sortable": false
        },
    ]
});

// DATA TABLE TYPES & TECHS
let table_types_techs = new DataTable('#table-types-techs', {
    responsive: true,
    language: {
        url: '/it-IT.json',
    },
    "columns": [
        {
            "sortable": true
        },
        {
            "sortable": true
        },
        {
            "sortable": true
        },
        {
            "sortable": true
        },
        {
            "sortable": false
        },
    ]
});