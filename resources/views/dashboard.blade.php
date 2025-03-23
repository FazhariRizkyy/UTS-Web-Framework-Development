<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @can('role-A')
                <div class="p-6 text-gray-900">
                    {{ __("Selamat Datang Kembali, ADMIN!") }}
                </div>
                @endcan
                @can('role-U')
                <div class="p-6 text-gray-900">
                    {{ __("Selamat Datang Kembali!") }}
                </div>
                @endcan
            </div>

            @can('role-A')
                <!-- Charts Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <!-- Bar Chart -->
                <div class="bg-white p-4 shadow rounded">
                    <h3 class="text-lg font-semibold text-gray-700">Booking Orders</h3>
                    <canvas id="barChart"></canvas>
                </div>

                <!-- Line Chart -->
                <div class="bg-white p-4 shadow rounded">
                    <h3 class="text-lg font-semibold text-gray-700">Website Visitor</h3>
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
            @endcan  
        </div>
    </div>

    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Chart Scripts -->
    <script>
        // Bar Chart
        var barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple'],
                datasets: [{
                    label: 'Tiket',
                    data: [12, 19, 3, 5, 2],
                    backgroundColor: ['red', 'blue', 'yellow', 'green', 'purple'],
                }]
            }
        });

        // Line Chart
        var lineCtx = document.getElementById('lineChart').getContext('2d');
        new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'User',
                    data: [500, 1000, 750, 1250, 1500],
                    borderColor: 'blue',
                    backgroundColor: 'rgba(0,0,255,0.1)',
                }]
            }
        });
    </script>
</x-app-layout>
