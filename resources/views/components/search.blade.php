<div class="row">
    <div class="col-md-12">
        <div class="main">
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" id="search" class="form-control barsearch" data-search="article" placeholder="Search">
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".barsearch").on("keyup", function() {
            let value = $(this).val().toLowerCase();
            let idsearch = $(this).attr('data-search');
            $(  "#"+ idsearch +" tr").filter(function() {
                $(this).toggle($(this).text()
                    .toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
