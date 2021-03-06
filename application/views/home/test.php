<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-table.min.js') ?>"></script>

<script type="text/javascript">

	function queryParams() {
    return {
        type: 'owner',
        sort: 'updated',
        direction: 'desc',
        per_page: 100,
        page: 1
    };
  }
  
  function imageFormatter(value) {
    if(value == null)
    {
      return '<img class="img-thumbnail" src="http://thetigertrade.com/assets/Images/defaultImage.jpg" alt="" width="100%" height="100%">';
    }
    else
    {
      var link = "<?php echo base_url(); ?>" + value;
      var defaultLink = "http://thetigertrade.com/assets/Images/defaultImage.jpg";
      return '<img class="img-thumbnail" src="'+link+'" onerror="this.src='+defaultLink+'" alt="" width="100%" height="100%">';
    }
   }

   function tagFormatter(value) {
    var string = "";
    var array = value.split(",");
    for (index = 0; index < array.length; ++index) {
      string = string + '<span class="label label-default">' + array[index] + '</span> ';
    }
    return string;
   }

	 
</script>
<table data-toggle="table"
       data-url="<?php echo base_url('json/getJson2');?>"
       data-query-params="queryParams"
       data-pagination="true"
       data-search="true"
       data-height="700">
    <thead>
    <tr>
        <th data-field="ad_id">Ad id</th>
        <th data-field="image" data-formatter="imageFormatter">Image</th>
        <th data-field="title">title</th>
        <th data-field="tags" data-formatter="tagFormatter">tags</th>
        <th data-field="description">Description</th>
    </tr>
    </thead>
</table>