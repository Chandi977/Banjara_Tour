<script src="assets/plugins/js/jquery.min.js"></script>
<script src="assets/plugins/js/bootstrap.min.js"></script>
<script src="assets/plugins/js/viewportchecker.js"></script>
<!-- <script src="assets/plugins/js/bootsnav.js"></script> -->
<script src="assets/plugins/js/slick.min.js"></script>
<script src="assets/plugins/js/jquery.nice-select.min.js"></script>
<script src="assets/plugins/js/jquery.fancybox.min.js"></script>
<script src="assets/plugins/js/jquery.downCount.js"></script>
<script src="assets/plugins/js/freshslider.1.0.0.js"></script>
<script src="assets/plugins/js/moment.min.js"></script>
<script src="assets/plugins/js/daterangepicker.js"></script>
<script src="assets/plugins/js/wysihtml5-0.3.0.js"></script>
<script src="assets/plugins/js/bootstrap-wysihtml5.js"></script>
<script src="assets/plugins/js/markerclusterer.js"></script>

<!-- Dashboard Js -->
<script src="assets/plugins/js/jquery.slimscroll.min.js"></script>
<script src="assets/plugins/js/jquery.metisMenu.js"></script>
<script src="assets/plugins/js/jquery.easing.min.js"></script>

<!-- Custom Js -->
<script src="assets/js/custom.js"></script>

<script>
$('#checkin').daterangepicker({
    "singleDatePicker": true,
    "timePicker": true,
    "startDate": "1/1/2022",
    "endDate": "1/1/2022"
}, function(start, end, label) {
    console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format(
        'YYYY-MM-DD') + ' (predefined range: ' + label + ')');
});
</script>

<script>
$('#checkout').daterangepicker({
    "singleDatePicker": true,
    "timePicker": true,
    "startDate": "10/1/2022",
    "endDate": "10/1/2022"
}, function(start, end, label) {
    console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format(
        'YYYY-MM-DD') + ' (predefined range: ' + label + ')');
});
</script>

<script src="assets/js/jQuery.style.switcher.js"></script>
<script>
function openRightMenu() {
    document.getElementById("rightMenu").style.display = "block";
}

function closeRightMenu() {
    document.getElementById("rightMenu").style.display = "none";
}
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#styleOptions').styleSwitcher();
});
</script>
<script type="module" src="../js/script.js"></script>
<script>
const loginBtn = document.getElementById('login');
const registerBtn = document.getElementById('register');
const effectBtn = document.getElementById('btn');

function register() {
    loginBtn.style.left = "-400px";
    registerBtn.style.left = "50px";
    effectBtn.style.left = "110px";
}

function login() {
    loginBtn.style.left = "50px";
    registerBtn.style.left = "450px";
    effectBtn.style.left = "0";
}
</script>