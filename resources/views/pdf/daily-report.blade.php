<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Daily Report' }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12pt;
            line-height: 1.5;
            width: 710px;
            color: #000;
            border: solid 1px black;
        }

        h1,
        h2 {
            margin-bottom: 10px;
        }

        h1 {
            font-size: 18pt;
            text-align: center;
            margin-bottom: 20px;

            padding-bottom: 8px;
        }

        h2 {
            font-size: 20pt;
            margin-top: 25px;
            margin-bottom: 10px;
        }

        h3 {
            font-size: 15pt;
            margin-left: 15px;
            color: cadetblue;
        }

        .section {
            margin-bottom: 20px;
        }

        .meta p {
            margin: 3px 0;
        }

        ul {
            margin: 0;
            padding-left: 18px;
            margin-left: 60px;
        }

        ul li {
            margin-bottom: 5px;

        }

        .signature {
            margin-top: 40px;
            font-style: italic;
        }

        footer {
            position: fixed;
            bottom: 20px;
            left: 40px;
            right: 40px;
            font-size: 10pt;
            text-align: center;
            color: #555;
            border-top: 1px solid #aaa;
            padding-top: 5px;
        }

        .header {
            width: 100%;
            text-align: center;
            margin-bottom: 2px;
            border-bottom: solid 2px blue;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            table-layout: fixed;
            /* prevent auto-shrink */
        }

        .header-table td {
            vertical-align: middle;
            text-align: center;
            padding: 0;
        }

        .header-table .left,
        .header-table .right {
            width: 30%;
            /* equal space for both texts */
        }

        .header-table .center {
            width: 20%;
        }

        .header img {
            height: 120px;
            /* adjust as needed */
        }

        .header h2 {
            font-size: 15pt;
        }

        .meta-table {
            width: 90%;
            border-collapse: collapse;
            margin-top: 0px;
            font-size: 12pt;
            margin-left: 35px;
            page-break-after: always;
        }

        .meta-table td {
            border: 1px solid #000;
            /* black border */
            padding: 6px 10px;
            vertical-align: top;
        }

        .section strong {
            color: blue;
            font-size: 12pt;
        }

        .section text {
            color: red;

        }

        .img {
            margin: 30px;
        }
        .forecast-block {
    margin: 20px 0;
    font-size: 10pt;
}

.forecast-block h3 {
    font-size: 12pt;
    font-weight: bold;
    margin-bottom: 8px;
    border-bottom: 1px solid #000;
    padding-bottom: 4px;
}

.forecast-block pre {
    white-space: pre-wrap; /* keep formatting */
    line-height: 1.4;
}

    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <table class="header-table">
            <tr>
                <td class="left">
                    <h2>Egyptian Space Agency</h2>
                </td>
                <td class="center">
                    <img src="http://127.0.0.1:8001/storage/image6.png" alt="Logo">
                </td>
                <td class="right">
                    <h2>
                        وكالة الفضاء المصرية
                    </h2>
                </td>
            </tr>
        </table>
    </div>


    <hr>

    <h1 style="color: red;        font-size: 22px;     margin-bottom: 50px;
">Egyptian Space Weather Monitoring and
        Forecasting Laboratory
        ({{ now()->toDateString() }})</h1>

    <!-- Metadata -->
    <table class="meta-table">
        <tr>
            <td><strong>Department:</strong></td>
            <td>Space Environment Department</td>
        </tr>
        <tr>
            <td><strong>Created by:</strong></td>
            <td>
                1. Eng. Hassan Mahdy Mohamed.<br>
                2. Eng. Abdulla Shaker Tawfik
            </td>
        </tr>
        <tr>
            <td><strong>Reviewed by:</strong></td>
            <td>Eng. Amira Hamdy Hussein</td>
        </tr>
        <tr>
            <td><strong>Approved by:</strong></td>
            <td>Eng. Amira Hamdy Hussein</td>
        </tr>
        <tr>
            <td><strong>Date of version:</strong></td>
            <td>{{ now()->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td><strong>Signature:</strong></td>
            <td>_______________________</td>
        </tr>
    </table>
    <!-- Header -->
    <div class="header">
        <table class="header-table">
            <tr>
                <td class="left">
                    <h2>Egyptian Space Agency</h2>
                </td>
                <td class="center">
                    <img src="http://127.0.0.1:8001/storage/image6.png" alt="Logo">
                </td>
                <td class="right">
                    <h2>
                        وكالة الفضاء المصرية
                    </h2>
                </td>
            </tr>
        </table>
    </div>

    <!-- Sections -->
    <div class="section">
        <h2>1. Solar Indices</h2>
        <h3>1.1 Solar Wind:</h3>
        <ul>
            <li><strong>speed: </strong> <text>{{ $speed['speed'] ?? '650 km/sec' }} </text> </li>
            <li><strong>density: </strong> <text>{{ $density ?? '2.7 protons/cm3' }}</text></li>
            </li>
        </ul>

        <h3>1.2 X-ray Solar Flares:</h3>
        <ul>
            <li><strong>6-hr max: </strong> <text>{{ $speed['speed'] ?? 'C1 0138 UT Sep15' }} </text> </li>
            <li><strong>4-hr: </strong> <text>{{ $density ?? 'C3 1523 UT Sep14' }}</text></li>
        </ul>
        <div class="img">
            <img style="    height: 250px;" src="http://127.0.0.1:8001/storage/image5.png" alt="">
            <img style="    height: 250px;" src="http://127.0.0.1:8001/storage/image4.png" alt="">
        </div>



        <h3>1.3 Sunspot Number and Solar Radio Flux:</h3>
        <ul>
            <li><strong>F10.7 Solar Radiation flux: </strong> <text>{{ $speed['speed'] ?? '122 sfu' }} </text> </li>
            <li><strong>Sun Spot Number = </strong> <text>{{ $density ?? '75' }}</text></li>
            </li>
        </ul>
    </div>

    <div class="section">
        <h2>2. Magnetic Indices</h2>

        < <h3>2.1 Kp Index :</h3>
            <ul>
                <li><strong>Now Kp=</strong> <text>{{ $speed['speed'] ?? '5.33 storm' }} </text> </li>
                <li><strong>24-hr max: Kp= </strong> <text>{{ $density ?? '6.67 storm' }}</text></li>
                </li>
            </ul>
            <h3>1.2 Interplanetary Mag. Field</h3>
            <ul>
                <li><strong>Btotal: </strong> <text>{{ $speed['speed'] ?? '9.34 nT' }} </text> </li>
                <li><strong>Bz: </strong> <text>{{ $density ?? '2.41 nT north' }}</text></li>
                </li>
            </ul>

    </div>

    <div class="section" style="page-break-after: always;">
        <h2>3. Ionospheric Indices</h2>
        <h3>3.1 Total Electron Content</h3>
        <ul>
            <li><strong>Max VTEC:</strong> {{ $tec['max'] ?? '35 TECU' }}</li>
            <li><strong>Min VTEC:</strong> {{ $tec['min'] ?? '4.5 TECU' }}</li>
        </ul>
        <img style="    height: 250px;" src="http://127.0.0.1:8001/storage/image3.png" alt="">

    </div>

    <div class="section1">
        <h2>4. Conclusion & Forecast</h2>

        <div class="forecast-block">
            <h3>1. Product</h3>
            <pre>{{ $forecast['product'] }}</pre>
        </div>

        <div class="forecast-block">
            <h3>2. NOAA Geomagnetic Activity Observation and Forecast</h3>
            <pre>{{ $forecast['geomagnetic'] }}</pre>
        </div>

        <div class="forecast-block">
            <h3>3. NOAA Solar Radiation Activity Observation and Forecast</h3>
            <pre>{{ $forecast['solar'] }}</pre>
        </div>

        <div class="forecast-block">
            <h3>4. NOAA Radio Blackout Activity and Forecast</h3>
            <pre>{{ $forecast['radio'] }}</pre>
        </div>


    </div>


    <!-- Footer -->
    <footer>
        Egyptian Space Agency – Generated on {{ now()->format('F j, Y g:i A') }}
    </footer>
</body>

</html>
