<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $name = htmlspecialchars(strip_tags($_POST["name"]));
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $products = isset($_POST["products"]) ? $_POST["products"] : [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Convert selected checkboxes into a string
    $products_list = !empty($products) ? implode(", ", $products) : "No products selected";

    // Email configuration
    $to = "your-email@example.com"; // Replace with your email
    $subject = "طلب جديد من $name";
    $message = "الاسم: $name\nالبريد الإلكتروني: $email\nالمنتجات المطلوبة: $products_list";
    $headers = "From: no-reply@yourdomain.com\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "تم إرسال طلبك بنجاح!";
    } else {
        echo "فشل إرسال الطلب. يرجى المحاولة مرة أخرى.";
    }
} else {
    echo "طريقة إرسال غير صالحة!";
}
?>
