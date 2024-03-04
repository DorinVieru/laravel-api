import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

document.getElementById('cover_image').addEventListener('change', function(){
    let file = this.files[0];
    document.getElementById('preview-image').src = URL.createObjectURL(file);
})