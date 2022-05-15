$(function()   
{  
    $(document).ready(function() {
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });

    var pathArray = window.location.pathname.split( '/,' ); 

    if (pathArray == '/home') {
        $('#home-link').addClass('active');  
    }
    else if (pathArray == "/students") {
        $('#students-link').addClass('active');  
    }
});   