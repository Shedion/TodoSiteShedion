@include('templates.header')

<div class="contact">
    <h1>Contact Us</h1>
    <p>If you have any questions or feedback, please email us at:</p>
    <p><strong><a href="mailto:info@justdoit.com">info@justdoit.com</a></strong></p>
    <p>We usually respond within 24-48 hours.</p>
    

    <p>We’re glad you want to get in touch! Whether you have questions, feedback, or ideas for improving our To-Do List app, feel free to reach out.</p>

    <h3>Feedback & Support</h3>
    <p>We welcome all feedback and will do our best to respond within 1-2 business days.</p>
    <p>If you experience any issues using the app, please let us know — your input helps us improve!</p>

</div>


    
<div class="contact">
    <p>
        Have questions or feedback? Reach out to us!
    </p>
    <form>
        <div class="form-group">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit">Send</button>
    </form>
</div>
@include('templates.footer')