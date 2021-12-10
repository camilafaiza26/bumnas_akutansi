<x-app-layout>
    <x-slot name="header_content">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        </div>
    </x-slot>

    <div class="bg-white  h-screen p-10 shadow-xl sm:rounded-lg ">

        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
         <div
      class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800"
    >
      <div class="p-4 flex items-center">
        <div
          class="p-3 rounded-full text-orange-500 dark:text-orange-100 bg-orange-100 dark:bg-orange-500 mr-4"
        >
          <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
            <path
              d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
            ></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            User
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            {{$jumlah_user}} user
          </p>
        </div>
      </div>
    </div>
    <div
      class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800"
    >
      <div class="p-4 flex items-center">
        <div
          class="p-3 rounded-full text-green-500 dark:text-green-100 bg-green-100 dark:bg-green-500 mr-4"
        >

        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
          <path fill-rule="evenodd" d="M3.5,6a1,1,0,1,0,1,1A1,1,0,0,0,3.5,6Zm4,2h14a1,1,0,0,0,0-2H7.5a1,1,0,0,0,0,2Zm0,3a1,1,0,1,0,1,1A1,1,0,0,0,7.5,11Zm4,5a1,1,0,1,0,1,1A1,1,0,0,0,11.5,16Zm10-5h-10a1,1,0,0,0,0,2h10a1,1,0,0,0,0-2Zm0,5h-6a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z"
          clip-rule="evenodd" > </path>
        </svg>
          
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
           Jumlah Rencana Kegiatan
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
          {{$jumlah_kegiatan}} kegiatan
          </p>
        </div>
      </div>
    </div>
    <div
      class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800"
    >
      <div class="p-4 flex items-center">
        <div
          class="p-3 rounded-full text-blue-500 dark:text-blue-100 bg-blue-100 dark:bg-blue-500 mr-4"
        >
        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="18" height="18"  viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8.49602399,4 L13.5439515,4.00178852 L13.5439515,4.00178852 L13.630264,4.01676284 L13.630264,4.01676284 L13.6925634,4.03779224 L13.6925634,4.03779224 L13.751259,4.06673495 L13.751259,4.06673495 L13.8131395,4.10892192 L13.8131395,4.10892192 L13.8706024,4.16266854 L13.8706024,4.16266854 L13.9112899,4.2133402 L13.9112899,4.2133402 L13.9460221,4.27080947 L13.9460221,4.27080947 L13.9782584,4.34880083 L13.9782584,4.34880083 L13.9897684,4.39191422 L13.9897684,4.39191422 L14.0010593,4.47831683 L14.0010593,4.47831683 L14.0015268,9.5 C14.0015268,9.77614237 13.7776692,10 13.5015268,10 C13.2560669,10 13.0519184,9.82312484 13.0095825,9.58987563 L13.0015268,9.5 L13.001,5.707 L7.85781951,10.853475 C7.68439276,11.0269787 7.41516142,11.0464153 7.22027109,10.911677 L7.15100427,10.853923 L5.50036956,9.20673722 L2.85355339,11.8535534 C2.65829124,12.0488155 2.34170876,12.0488155 2.14644661,11.8535534 C1.97288026,11.679987 1.95359511,11.4105626 2.08859116,11.2156945 L2.14644661,11.1464466 L5.14644661,8.14644661 C5.31988462,7.9730086 5.58906947,7.95360702 5.7839278,8.08833082 L5.85318344,8.14607705 L7.50373972,9.79318452 L12.293,5 L8.49602399,5 C8.2505641,5 8.04641562,4.82312484 8.00407966,4.58987563 L7.99602399,4.5 C7.99602399,4.22385763 8.21988162,4 8.49602399,4 Z" /></svg>
          
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Rencana Kegiatan Untung
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
          {{$jumlah_untung}} kegiatan
          </p>
        </div>
      </div>
    </div>
    <div
      class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-white dark:bg-gray-800"
    >
      <div class="p-4 flex items-center">
        <div
          class="p-3 rounded-full text-teal-500 dark:text-teal-100 bg-teal-100 dark:bg-teal-500 mr-4"
        >
        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
          <path fill-rule="evenodd" d="M21,11a1,1,0,0,0-1,1v2.59l-6.29-6.3a1,1,0,0,0-1.42,0L9,11.59,3.71,6.29A1,1,0,0,0,2.29,7.71l6,6a1,1,0,0,0,1.42,0L13,10.41,18.59,16H16a1,1,0,0,0,0,2h5a1,1,0,0,0,.38-.08,1,1,0,0,0,.54-.54A1,1,0,0,0,22,17V12A1,1,0,0,0,21,11Z"
          clip-rule="evenodd" />
        </svg>

        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Rencana Kegiatan Rugi
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200"> {{$jumlah_rugi}} kegiatan</p>
        </div>
      </div>
    </div>
  </div>     
  
  <div class="w-1/2 h-0" >
  <canvas id="myChart"></canvas>
  <div>

        </div>
    </section>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2/dist/chart.min.js"> </script>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Dagang', 'Jasa', 'Manufaktur', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: 'Jenis Usaha',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
</x-app-layout>
