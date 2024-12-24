<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizing input data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $graduationYear = intval($_POST['graduationYear']);
    $jobStatus = htmlspecialchars($_POST['jobStatus']);
    $comments = htmlspecialchars($_POST['comments']);

    // Simulate saving data to the database (replace this with actual DB logic)
    $dataSaved = true; // Set to false if there is an error

    // Create response data
    if ($dataSaved) {
        $response = [
            'success' => true,
            'message' => 'Data berhasil disimpan. Terima kasih!',
            'name' => $name,
            'email' => $email,
            'graduationYear' => $graduationYear,
            'jobStatus' => $jobStatus,
            'comments' => $comments,
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Gagal menyimpan data. Silakan coba lagi.'
        ];
    }

    // Return response as JSON
    echo json_encode($response);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Tracer Alumni</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9ecef;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tracer Alumni</h2>
        <form id="tracerForm">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="graduationYear">Tahun Lulus</label>
            <input type="number" id="graduationYear" name="graduationYear" min="1900" max="2100" required>

            <label for="jobStatus">Status Pekerjaan</label>
            <select id="jobStatus" name="jobStatus" required>
                <option value="">Pilih...</option>
                <option value="Bekerja">Bekerja</option>
                <option value="Belum Bekerja">Belum Bekerja</option>
                <option value="Wirausaha">Wirausaha</option>
            </select>

            <label for="comments">Komentar</label>
            <textarea id="comments" name="comments" rows="4" placeholder="Tambahkan komentar..."></textarea>

            <button type="submit">Kirim</button>
        </form>

        <div id="message" class="message" style="display: none;"></div>

        <div id="result" class="result" style="display: none;">
            <h3>Data yang Dikirim</h3>
            <p><strong>Nama Lengkap:</strong> <span id="resultName"></span></p>
            <p><strong>Email:</strong> <span id="resultEmail"></span></p>
            <p><strong>Tahun Lulus:</strong> <span id="resultGraduationYear"></span></p>
            <p><strong>Status Pekerjaan:</strong> <span id="resultJobStatus"></span></p>
            <p><strong>Komentar:</strong> <span id="resultComments"></span></p>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#tracerForm").on("submit", function(e) {
                e.preventDefault();

                // Send data via AJAX
                $.ajax({
                    url: "", // Submit to the same page
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        let res = JSON.parse(response);
                        let messageBox = $("#message");

                        if (res.success) {
                            messageBox.addClass("success").removeClass("error");
                            messageBox.text(res.message).show();

                            // Display the data that was submitted
                            $("#resultName").text(res.name);
                            $("#resultEmail").text(res.email);
                            $("#resultGraduationYear").text(res.graduationYear);
                            $("#resultJobStatus").text(res.jobStatus);
                            $("#resultComments").text(res.comments);

                            $("#result").show();
                            $("#tracerForm")[0].reset();
                        } else {
                            messageBox.addClass("error").removeClass("success");
                            messageBox.text(res.message).show();
                        }
                    },
                    error: function() {
                        alert("Terjadi kesalahan saat mengirim data.");
                    }
                });
            });
        });
    </script>
</body>
</html>
