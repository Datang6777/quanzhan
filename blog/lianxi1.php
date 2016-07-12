<script>
    if(window.location.hash && window.location.hash.indexOf("tab_")!=1)
    {
        console.log(window.location.hash);
        var href = window.loaction.replace("tab_","");
        $('.nav-tabs a[href="'+href+'"]').tab("show");
    }
    $('.nav-tabs a[data-toggle="tab"]').on("show.bs.tab"),function(e){
        window.location.hash = "tab_"+ e.target.hash.substr(1);
    });
    $(window).on('hashchange',function(){
        var href = window.location.hash.replace("tab_",'');
        $('.nav-tabs a[href="'+href+'"]).tab("show");
    });
</script>