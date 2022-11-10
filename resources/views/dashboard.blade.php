@extends('layouts.sidebar')
@section('main')
<div class="shadow-lg h-full">
    <div class="w-full">
        <div class="flex lg:flex-row gap-10 justify-between mt-5 flex-col px-5">
        
            <div class="mx-6 text-2xl font-bold ">Dashboard</div>
            <div class="flex mx-6 ">
            <div class="block rounded-lg mr-2 bg-blue-700 shadow-lg p-2  hover:bg-indigo-900 hover:text-white">
               
                <button class="font-bold  text-white hover:text-white pl-2" onclick="show()" @if (App\Models\Attendence::whereDate('date', Carbon\Carbon::today())->where('user_id', auth()->user()->id)->first()) disabled @endif>
                    <i class="fa-solid fa-stopwatch"></i><i class="m-1 fa-solid fa-arrow-right"></i>Clock In </button>
            </div>
    
            <div class="block rounded-lg mr-2 bg-blue-700 shadow-lg p-2 hover:bg-indigo-900 hover:text-white">
                
                <button class="font-bold text-white pl-2 hover:text-white" onclick="cshow()" @if (App\Models\Attendence::whereDate('date', Carbon\Carbon::today())->where('clock_out','!=','null')->where('user_id', auth()->user()->id)->first()) disabled @endif>
                    <i class="fa-solid fa-stopwatch"></i><i class="m-1 fa-solid fa-arrow-right"></i>Clock Out</button>
            </div>
    
            {{-- <div class="block rounded-lg mr-2 bg-blue-500 shadow-lg p-2  hover:bg-indigo-800 hover:text-white">
                <button class="font-bold text-white pl-2 hover:text-white ">
    
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <i class="fa-sharp fa-solid fa-person-walking-arrow-right"></i>
                    <input type="submit" value="Logout">
                  </form>
                </button>
            </div> --}}
    
            <div class="block rounded-lg mr-2 bg-blue-700 shadow-lg p-2 hover:bg-indigo-900 hover:text-white">
                
                <button class="font-bold text-white pl-2 hover:text-white">
                    <a href="{{ route('leave.create') }}">
                        <i class="fa-sharp fa-solid fa-person-walking"></i>Ask leave
                    </a>
                    </button>
            </div>
    
    
            
            </div>
    
            
        </div>
        
        <div class="shadow-lg sm:rounded-lg p-10 px-0 w-full">
            <div class="flex gap-10 px-5 flex-col md:flex-row">
                <div class="block p-2 rounded-lg shadow-lg bg-white w-60">
                    <div class="antialiased font-bold text-gray-600 pl-2">
                       <i class="fa-solid fa-clipboard-user text-xl text-white bg-blue-500 p-5 rounded-md "></i>
                       Total Attendance  {{ $attendance }} </div>
                </div>
             
                   <div class="block p-2 rounded-lg shadow-lg bg-white w-60">
                       <div class="antialiased font-bold text-gray-600 pl-2">
                          <i class="fa-solid fa-plane-departure text-white bg-blue-500 p-5 rounded-md"></i>
                          Total Airlines<div class="text-xl text-gray-600 pl-24">{{  $airline  }}</div></div>
                   </div>
                
                <div class="block p-2 rounded-lg shadow-lg bg-white  w-60">
                   <div class="antialiased font-bold text-gray-600 pl-2">
                    <i class="fa-solid fa-brazilian-real-sign text-white bg-blue-500 p-5 rounded-md"></i>
                    Today Incomes<div class="text-xl text-gray-600 pl-20">Rs.{{ $income }}</div></div>
                </div> 
            </div>
       
            <div class="flex gap-10 px-5 flex-col md:flex-row mt-8">
                   <div class="block p-2 rounded-lg shadow-lg bg-white  w-60">
                      <div class="antialiased font-bold text-gray-600 pl-2">
                       <i class="fa-solid fa-cake-candles text-white bg-blue-500 p-5 rounded-md"></i>
                       upcoming Birthday's<div class="text-xl text-gray-600 pl-20">{{ $upcomings  }}</div></div>
                   </div> 
       
                   <div class="block p-2 rounded-lg shadow-lg bg-white  w-60">
                      <div class="antialiased font-bold text-gray-600 pl-2">
                       <i class="fa-solid fa-solid fa-database text-white bg-blue-500 p-5 rounded-md"></i>
                       Total Leaves<div class="text-xl text-gray-600 pl-20">Rs.{{ $leave }}</div></div>
                   </div> 
               
                   <div class="block p-2 rounded-lg shadow-lg bg-white  w-60">
                      <div class="antialiased font-bold text-gray-600 pl-2">
                       <i class="fa-solid fa-copy text-white bg-blue-500 p-5 rounded-md"></i>
                       Today Tickets<div class="text-xl text-gray-600 pl-20">{{ $today_ticket }}</div></div>
                   </div> 
            </div>
       
            <div class="flex gap-10 px-5 flex-col md:flex-row mt-8">
                   <div class="block p-2 rounded-lg shadow-lg bg-white w-60">
                      <div class="antialiased font-bold text-gray-600 pl-2">
                       <i class="fa-solid fa-cake-candles text-white bg-blue-500 p-5 rounded-md"></i>
                       Clients's Birthday<div class="text-xl text-gray-600 pl-20">{{ $upcommings  }}</div></div>
                   </div> 
                  
                   <a href="{{ route('attendence.month') }}">
                   <div class="block p-2 rounded-lg shadow-lg bg-white w-60">
                      <div class="antialiased font-bold text-gray-600 pl-2">
                       <i class="fa-solid fa-newspaper text-white bg-blue-500 p-5 rounded-md"></i>
                       month attendence<div class="text-xl text-gray-600 pl-20">{{ $this_month_attendence }}</div></div>
                   </div> 
                   </a>
               
                   <div class="block p-2 rounded-lg shadow-lg bg-white w-60">
                      <div class="antialiased font-bold text-gray-600 pl-2">
                       <i class="fa-solid fa-paper-plane text-white bg-blue-500 p-5 rounded-md"></i>
                       Upcoming Tickets<div class="text-xl text-gray-600 pl-20">{{ $upcoming_ticket }}</div></div>
                   </div> 
            </div>
       

       
        </div>

        <div class="flex gap-8 mt-4">
            <div class="flex flex-col w-1/2 border border-gray-300 ml-5">
                <div class="p-3 antialised bg-blue-500 text-white font-bold">Upcoming User's Birthday</div>
                <div class="flex flex-col  max-h-[200px] overflow-y-scroll scrollbar">
                    @foreach ($upcoming as $user)
                    <div class="p-3 border-b">
                        <div class="flex justify-between ">
                            <div class="text-xl font-semibold">{{ $user->name }}</div>
                            <div>

                                {!! $user->remaining === 0
                                    ? 'Today <i class="fa-solid fa-cake-candles"></i>'
                                    : $user->remaining . ' ' . 'days remaining' !!}
                            </div>
                        </div>
                        <div class="flex flex-row gap-8">
                            <div>{{ Carbon\Carbon::parse($user->dob)->format('M-d') }}</div>
                            <div>{{ $user->phonenumber }}</div>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>
            <div class="flex flex-col w-1/2 border border-gray-300 mr-5">
            <div class="p-3 antialised bg-blue-500 text-white font-bold">Upcoming Client's Birthday</div>
            <div class="flex flex-col  max-h-[200px] overflow-y-scroll scrollbar">
                @foreach ($upcoming_client as $client)
                    <div class="p-3 border-b">
                        <div class="flex justify-between ">
                            <div class="text-xl font-semibold">{{ $client->name }}</div>
                            <div>
                                {!! $client->remaining === 0
                                    ? 'Today <i class="fa-solid fa-cake-candles"></i>'
                                    : $client->remaining . ' ' . 'days remaining' !!}
                            </div>
                        </div>
                        <div class="flex flex-row gap-8">
                            <div>{{ Carbon\Carbon::parse($user->dob)->format('M-d') }}</div>
                            <div>{{ $client->phonenumber }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

   
                
            </div>

          


           
                
        </div>

        {{-- Diagram --}}
       
        <div class="flex gap-8 mt-4">
            <div class="flex flex-col w-1/2 border border-gray-300 ">
                <div class="p-3 antialised bg-blue-500 text-white font-bold">Income and Expenditure</div>
                <div id="container"></div>
            </div>

            <div class="flex flex-col w-1/2 border border-gray-300 ">
                <div class="p-3 antialised bg-blue-500 text-white font-bold">Attendence</div>
                <div id="Attendances"></div>
            </div>

           

                
            </div>


            {{-- Task Diagram --}}
            <div class="flex gap-8 mt-4">
                <div class="flex flex-col w-full border border-gray-300 ">
                    <div class="p-3 antialised bg-blue-500 text-white text-center font-bold">Task</div>
            <div id="Task"></div>
                </div>
        </div>

          {{-- End Diagram --}}


           
                
        </div>
       
       
   
    

    
    


    <!-- clock in -->
    <div class=" hidden  showbox backdrop-blur-lg fixed top-0 left-0 right-0 bottom-0 p-2 bg-gray-800 bg-opacity-25 border-red-100 rounded-md shadow-xl w-full flex-center">
        <div class="flex justify-center">
            <div class="bg-white shadow-lg rounded-md w-96 h-96 mt-[10%]">
                <div class="py-3 px-5">
                    <a href="{{ route('dashboard') }}">
                    <i class="fa-sharp fa-solid fa-circle-xmark float-right ">
                        </i> 
                   
                    </a>
                </div>
                <div class="text-center text-black text-xl py-10 px-10 mt-2">
                   <h1 class="font-bold">Remarks</h1>
                </div>
    
                <div class="flex text-center px-40 gap-5 justify-center">
                        <form action="{{ route('attendence.store') }}" method="post">
                            @csrf
                            <textarea class="flex justify-center" name="reason" placeholder="Reason here...."></textarea>
                            <div class="pt-3">
                                <button type="submit"  class="py-2 px-4 bg-blue-400 justify-center ">
                                    
                                    submit</button>
                            </div>
                           
                        </form>
                </div>
            </div>
            
        </div>
        
            
        </div>

        <!-- clock out -->

        <div class=" hidden  cshowbox backdrop-blur-lg fixed top-0 left-0 right-0 bottom-0 p-2 bg-gray-800 bg-opacity-25 border-red-100 rounded-md shadow-xl w-full flex-center">
            <div class="flex justify-center">
                <div class="bg-white shadow-lg rounded-md w-96 h-96 mt-[10%]">
                    <div class="py-3 px-5">
                        <a href="{{ route('dashboard') }}">
                        <i class="fa-sharp fa-solid fa-circle-xmark float-right ">
                            </i> 
                       
                        </a>
                    </div>
                    <div class="text-center text-black text-xl py-10 px-10 mt-2">
                       <h1 class="font-bold">Remarks</h1>
                    </div>
        
                    <div class="flex text-center px-40 gap-5 justify-center">
                        @if (isset($attendence))
                            <form action="{{ route('attendence.update', $attendence->id) }}" method="post">
                               
                                @csrf
                                @method('PUT')
                                <textarea class="flex justify-center" name="reason1" id="reason1" placeholder="Reason here...."></textarea>
                                <div class="pt-3">
                                    <button type="submit"  class="py-2 px-4 bg-blue-400 justify-center ">
                                        
                                        submit</button>
                                </div>
                               
                            </form>
                            @endif
                    </div>
                </div>
                
            </div>
            
                
            </div>
</div>
</div>

<script>
     function show() {
        $('.showbox').removeClass('hidden');

    }
    function hide(){
        $('.showbox','.cshowbox').addClass('hidden');
    }

    function cshow() {
        $('.cshowbox').removeClass('hidden');
    }



    
</script>

@endsection

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    
var incomeexp = <?= json_encode($finalIncomeExpenditureReport)?>;
Highcharts.chart('container', {
                    title: {
                        text: 'Income and Expenditure, Last 7 Days',
                    },
                    xAxis: {
                        categories: incomeexp.days
                    },
                    yAxis: {
                        title: {
                            text: 'Income and expenditure'
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },
                    plotOptions: {
                        series: {
                            allowPointSelect: true
                        }
                    },
                    series: [{
                            name: 'Income',
                            data: incomeexp.incomes
                        },
                        {
                            name: 'Expenditure',
                            data: incomeexp.expenditures
                        }
                    ],
                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }
                });

</script>

<script>
  
  Highcharts.setOptions({

colors: ['#67BCE6'],

chart: {

  style: {

    fontFamily: 'sans-serif',

    color: '#fff'

  }

}

});



$('#Attendances').highcharts({

chart: {

  type: 'column',

  backgroundColor: '#fff'

},

title: {

  text: 'Attendence',

  style: {

   color: 'black'

  }

},

xAxis: {

  tickWidth: 0,

  labels: {

   style: {

     color: 'black',

     }

   },

  categories: [

    'January',

    'February',

    'March',

    'April',

    'May',

    'June',

    'July',

    'August',

    'September',

    'October',

    'November',

    'December',


  ]

},

yAxis: {

  gridLineWidth: .5,

  gridLineDashStyle: 'dash',

  gridLineColor: 'black',

  title: {

    text: '',

    style: {

     color: 'black'

     }

  },

  labels: {

    formatter: function() {

      return Highcharts.numberFormat(this.value, 0, '', ',');

    },

    style: {

      color: 'black',

    }

  }

},

legend: {

  enabled: false,

},

credits: {

  enabled: false

},

tooltip: {

  valuePrefix: ''

},

plotOptions: {

  column: {

    borderRadius: 0,

    pointPadding: 0,

    groupPadding: 0.05

  }

},

series: [{

  name: 'Attendence',
  data: {{ $finalattendence }} 

  // data: [

  //   690,

  //   938,

  //   612,

  //   4250,

  //   2852,

  //   1002,

  //   728,

  //   1156,

  //   956,

  //   4487,

  //   3453,

  //   4342,


  // ]

}]

});

</script>
<script>
  var task = <?= json_encode($final)?>;
   
Highcharts.chart('Task', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'Today Tasks'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
      }
    }
  },
  series: [{
    name: 'tasks',
    colorByPoint: true,
    data: [{
      name: 'Pending',
      y:task.pen,
      sliced: true,
      selected: true
    }, {
      name: 'Processing',
      y:task.proc
    },  {
      name: 'Complete',
      y:task.com
    }, ]
  }]
});
    </script>

  @endsection

 


