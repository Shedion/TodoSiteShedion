{{-- filepath: resources/views/about.blade.php --}}
@include('templates.header')

<div id="aboutPage">
    <h1 id="about">About Just Do It</h1>
    <p>
        <strong>Just Do It</strong> is a simple and effective todo application to help you organize your tasks and boost your productivity.
    </p>
    <div class="about-features">
        <h2>Features</h2>
        <ul>
            <li>Add, edit, and remove todo items</li>
            <li>Set deadlines and track your progress</li>
            <li>Each user has their own secure todo list</li>
            <li>Clean, modern, and responsive design</li>
        </ul>
    </div>
    <div class="about-team">
        <div class="team-members">
            <div class="team-member">
            </div>
            <!-- Add more team members here if you want -->
        </div>
    </div>
    <div class="about-contact">
        <h2>Contact</h2>
        <p>
            Have questions or feedback? <a href="{{ url('/contact') }}">Contact us here</a>.
        </p>
    </div>
</div>

@include('templates.footer')