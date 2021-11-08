<script>
    var datas = <?php echo json_encode($datas); ?>;
    
    var optionsProfileVisit = {
        annotations: {
            position: 'back'
        },
        dataLabels: {
            enabled:false
        },
        chart: {
            type: 'bar',
            height: 300
        },
        fill: {
            opacity:1
        },
        plotOptions: {
        },
        series: [{
            name: 'sales',
            data: datas
        }],
        colors: '#435ebe',
        xaxis: {
            categories: ["Jan","Feb","Mar","Apr","May","Jun","Jul", "Aug","Sep","Oct","Nov","Dec"],
        },
    }

    var complaint_process = {{ $complaints->where('status', '=', 'Process')->count() }}
    var complaint_pending = {{ $complaints->where('status', '=', 'Pending')->count() }}
    var complaint_completed = {{ $complaints->where('status', '=', 'Completed')->count() }}

    let optionsVisitorsProfile  = {
        series: [complaint_process, complaint_pending, complaint_completed],
        labels: ['Process', 'Pending', 'Completed'],
        colors: ['#435ebe','#55c6e8', '#11E48C'],
        chart: {
            type: 'donut',
            width: '100%',
            height:'350px'
        },
        legend: {
            position: 'bottom'
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '30%'
                }
            }
        }
    }

    var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
    var chartVisitorsProfile = new ApexCharts(document.getElementById('chart-visitors-profile'), optionsVisitorsProfile)
    
    chartProfileVisit.render();
    chartVisitorsProfile.render()
</script>

<script type="text/javascript">
    $(function () {
        
        const table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('complaint.list') }}",
            dom: "  <'row'<'col-sm-2 text-center'l><'col-sm-8'B><'col-sm-2'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row'<'col-sm-8'ip>>",
            responsive: true,
            columns: [
                {data: 'id', name: 'id'},
                {data: 'username', name: 'username'},
                {data: 'title', name: 'title'},
                {data: 'date', name: 'date'},
                {data: 'status', name: 'status'},
                {data: 'location', name: 'location'},
                {
                    data: 'options', 
                    name: 'options', 
                    orderable: false, 
                    searchable: false
                },
            ]
        });
        
    });
</script>

<script type="text/javascript">
    $(function () {
        
        const table = $('.yajra-datatable-user').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('user.list') }}",
            
            responsive: true,
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'username', name: 'username'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'level', name: 'level'},
            ]
        });
        
    });
</script>