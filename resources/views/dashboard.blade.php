<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>IoT Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 p-6">
  <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden p-6">
    <div class="flex items-center mb-6">
      <i class="fas fa-microchip text-blue-500 text-3xl mr-3"></i>
      <h1 class="text-2xl font-bold text-gray-800">IoT Sensor Dashboard</h1>
    </div>

    <!-- Sensor Data Section -->
    <div class="mb-8">
      <div class="flex items-center mb-4">
        <i class="fas fa-table text-blue-500 mr-2"></i>
        <h2 class="text-xl font-semibold text-gray-700">Sensor Data</h2>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full table-auto text-left rounded-lg overflow-hidden">
          <thead class="bg-gray-100">
            <tr>
              <th class="px-4 py-3 text-gray-700 font-medium"><i class="far fa-clock mr-2"></i>Waktu</th>
              <th class="px-4 py-3 text-gray-700 font-medium"><i class="fas fa-temperature-high mr-2"></i>Suhu</th>
              <th class="px-4 py-3 text-gray-700 font-medium"><i class="fas fa-tint mr-2"></i>Kelembaban</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            @foreach($data as $row)
              <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-4 py-3 text-gray-600">{{ $row->created_at->format('H:i:s') }}</td>
                <td class="px-4 py-3 text-gray-600 font-medium">{{ $row->temperature }}°C</td>
                <td class="px-4 py-3 text-gray-600 font-medium">{{ $row->humidity }}%</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <!-- Control Section -->
    <div>
      <div class="flex items-center mb-4">
        <i class="fas fa-paper-plane text-blue-500 mr-2"></i>
        <h2 class="text-xl font-semibold text-gray-700">Send Command</h2>
      </div>
      <form action="/control" method="POST" class="space-y-4">
        @csrf
        <div class="space-y-2">
          <label class="block text-gray-700 font-medium"><i class="fas fa-sliders-h mr-2"></i>Servo Angle</label>
          <div class="flex items-center space-x-4">
            <i class="fas fa-angle-left text-gray-400"></i>
            <input type="range" name="servo_position" min="0" max="180" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
            <i class="fas fa-angle-right text-gray-400"></i>
          </div>
          <div class="text-xs text-gray-500 flex justify-between">
            <span>0°</span>
            <span>90°</span>
            <span>180°</span>
          </div>    
        </div>
        <div>
          <label class="block text-gray-700 font-medium mb-2"><i class="fas fa-font mr-2"></i>LCD Text</label>
          <div class="relative">
            <input type="text" name="lcd_text" class="w-full border border-gray-300 rounded-lg p-3 pl-10 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" placeholder="Enter text to display...">
            <i class="fas fa-keyboard absolute left-3 top-3.5 text-gray-400"></i>
          </div>
        </div>
        <button class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300 flex items-center justify-center space-x-2">
          <i class="fas fa-paper-plane"></i>
          <span>Send Command</span>
        </button>
      </form>
    </div>
  </div>
</body>
</html>
