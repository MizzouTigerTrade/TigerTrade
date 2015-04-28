<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-table.min.js') ?>"></script>

<script type="text/javascript">

	function nameFormatter(value) {
    return '<img class="img-thumbnail" src="http://thetigertrade.com/assets/Images/defaultImage.jpg" alt="" width="100%" height="100%">'
}

function starsFormatter(value) {
    return '<i class="glyphicon glyphicon-star"></i> ' + value;
}

function forksFormatter(value) {
    return '<i class="glyphicon glyphicon-cutlery"></i> ' + value;
}
 
}
</script>
<table data-toggle="table"
       data-url="/gh/get/response.json/wenzhixin/bootstrap-table/tree/master/docs/data/data1/">
    <thead>
    <tr>
        <th data-field="name" data-formatter="nameFormatter">Name</th>
        <th data-field="stargazers_count" data-formatter="starsFormatter">Stars</th>
        <th data-field="forks_count" data-formatter="forksFormatter">Forks</th>
        <th data-field="description">Description</th>
    </tr>
    </thead>
</table>