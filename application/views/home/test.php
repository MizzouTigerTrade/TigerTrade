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
</script>
<table data-toggle="table"
       data-url="https://api.github.com/users/wenzhixin/repos"
       data-query-params="queryParams"
       data-pagination="true"
       data-search="true"
       data-height="300">
    <thead>
    <tr>
        <th data-field="name">Name</th>
        <th data-field="stargazers_count">Stars</th>
        <th data-field="forks_count">Forks</th>
        <th data-field="description">Description</th>
    </tr>
    </thead>
</table>