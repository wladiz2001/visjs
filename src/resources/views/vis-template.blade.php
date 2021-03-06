<div id="{!! $element !!}" style="width:{!! $size['width'] !!};height:{!! $size['height'] !!};">
<script type="text/javascript">
    // create an array with nodes
    var nodes = new vis.DataSet({!!json_encode($datasets['nodes'], JSON_PRETTY_PRINT)!!});
    {{--
	/*var nodes = new vis.DataSet([
        {id: 1, label: 'Node 1'},
        {id: 2, label: 'Node 2'},
        {id: 3, label: 'Node 3'},
        {id: 4, label: 'Node 4'},
        {id: 5, label: 'Node 5'}
    ]);*/
    --}}
    // create an array with edges
    var edges = new vis.DataSet({!!json_encode($datasets['edges'], JSON_PRETTY_PRINT)!!});
    {{--
        /*var edges = new vis.DataSet([
          {from: 1, to: 3},
          {from: 1, to: 2},
          {from: 2, to: 4},
          {from: 2, to: 5}
         ]);*/
      --}}
    // create a network
    var container = document.getElementById("{!! $element !!}");
    // provide the data in the vis format
    var data =
    {
        nodes: nodes,
        edges: edges
    };

    var options =
    @if(empty($options))
    {};
    @else
        @php
            $string = str_replace('"', '', json_encode($options,JSON_PRETTY_PRINT));
            $string = str_replace('\n','',$string);
            $string = str_replace('\t','',$string);
        @endphp
        {!! $string !!};
    @endif
    // initialize your network!
    var network = new vis.Network(container, data, options);
</script>
</div>
