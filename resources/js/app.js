$(function() {
    $('#dataTable').DataTable({
        ajax: '/projects',
        columns: [
            {
                data: 'name',
                render : function (data, type, row, meta) {
                    return `<img src="${row.url}" width="40" height="40"></img> ${data}`;
                }
            },
            {
                data: 'total_deposit'
            },
            {
                data: 'rewards'
            },
            {
                data: 'participants'
            },
            {
                data: 'minimum_deposit'
            },
            {
                data: 'project_id',
                render : function (data, type, row, meta) {
                    return `
                        <a href="https://pocm.nuls.io/Projects/ProjectsInfo?releaseId=${data}" class="btn btn-sm bg-info" title="Visualizar" target="_blank"><i class="fa fa-eye"></i></a>
                    `
                }
            },
        ],
        pageLength: 25,
        order: [[ 3, "desc" ]]
    });
});
