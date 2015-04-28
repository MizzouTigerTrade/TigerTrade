<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-table.min.js') ?>"></script>

<script type="text/javascript">

	/*function queryParams() {
    return {
        type: 'owner',
        sort: 'updated',
        direction: 'desc',
        per_page: 100,
        page: 1
    };
  }*/
  
  function imageFormatter(value) {
    if(value == null)
    {
      return '<img class="img-thumbnail" src="http://thetigertrade.com/assets/Images/defaultImage.jpg" alt="" width="100%" height="100%">';
    }
    else
    {
      var link = '<?php echo base_url('/')' + value;
      return '<img class="img-thumbnail" src="'+value+'" width="100%" height="100%">';
    }
   }

	 
</script>
<table data-toggle="table"
       data-url="<?php echo base_url('json/getJson');?>"
       data-query-params="queryParams"
       data-pagination="true"
       data-search="true"
       data-height="700">
    <thead>
    <tr>
        <th data-field="ad_id">Ad id</th>
        <th data-field="image" data-formatter="imageFormatter">Image</th>
        <th data-field="title">title</th>
        <th data-field="description">Description</th>
    </tr>
    </thead>
</table>