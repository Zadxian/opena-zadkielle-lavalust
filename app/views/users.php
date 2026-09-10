<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>the users</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;

           
            background-image: url('/images/durr.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: #fdf6e3;
        }

        .container {
            background: rgba(255, 251, 235, 0.95);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            padding: 30px 40px;
            width: 100%;
            max-width: 900px;
            border: 1px solid #f5e6a8;
        }

        h2 {
            color: #7a6a2f;
            margin-bottom: 20px;
            font-size: 24px;
            border-bottom: 3px solid #f0d878;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #f7e69c;
        }

        th {
            color: #6b5b1e;
            text-align: left;
            padding: 12px 15px;
            font-weight: 600;
            font-size: 14px;
        }

        tbody tr {
            border-bottom: 1px solid #f3ecc9;
            transition: background-color 0.2s ease;
        }

        tbody tr:hover {
            background-color: #fdf8e3;
        }

        td {
            padding: 12px 15px;
            color: #4a4326;
            font-size: 14px;
        }

        .empty {
            text-align: center;
            color: #b0a273;
            font-style: italic;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Users in the table</h2>

    <table>
        <thead>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Username</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= html_escape($user['id'] ?? ''); ?></td>
                        <td><?= html_escape($user['firstname'] ?? ''); ?></td>
                        <td><?= html_escape($user['lastname'] ?? ''); ?></td>
                        <td><?= html_escape($user['email'] ?? ''); ?></td>
                        <td><?= html_escape($user['username'] ?? ''); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="empty">No users found in the database.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>