<section class="newsletter_area">
    <!-- Wrapper container -->
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="main_title">
                    <h2>Feedback</h2>
                </div>
            </div>
        </div>

        <!-- Bootstrap 5 starter form -->
        <form name="submit-to-google-sheet">
            <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
                Feedback has been sent to the owner
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <!-- Name input -->
            <div class="mb-3">
                <label class="form-label" for="name">Full Name</label>
                <input class="form-control" id="fullName" type="text" placeholder="Full name" required />
            </div>

            <!-- Email address input -->
            <div class="mb-3">
                <label class="form-label" for="emailAddress">Email Address</label>
                <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" name="email"
                    required />
            </div>

            <!-- Message input -->
            <div class="mb-3">
                <label class="form-label" for="message">Message</label>
                <textarea class="form-control" id="message" name="message" type="text" placeholder="Message"
                    style="height: 10rem;" required></textarea>
            </div>

            <!-- Form submit button -->
            <div class="d-grid">
                <button class="btn btn-primary btn-lg btn-send" id="submitButton" type="submit">Send</button>
                <button class="btn btn-primary btn-lg d-none btn-loading" type="button" disabled>
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
            </div>

        </form>

    </div>
</section>
