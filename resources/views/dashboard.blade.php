<x-app-layout>

    <x-slot name="header">
        <div class="dashboard-header">
            <div>
                <p class="dashboard-eyebrow">INTERNSHIPHUB</p>
                <h2>Student Dashboard</h2>
                <p class="dashboard-header-text">
                    Manage and track your internship journey.
                </p>
            </div>

            <div class="dashboard-user">
                <div class="dashboard-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                <div>
                    <strong>{{ Auth::user()->name }}</strong>
                    <span>Student</span>
                </div>
            </div>
        </div>
    </x-slot>


    <div class="dashboard-page">

        <div class="dashboard-container">

            {{-- Welcome Section --}}
            <div class="welcome-card">

                <div class="welcome-content">
                    <span class="welcome-label">
                        <i class="fa-solid fa-graduation-cap"></i>
                        Student Portal
                    </span>

                    <h1>
                        Welcome back, {{ Auth::user()->name }}!
                    </h1>

                    <p>
                        Track your internship application, placement,
                        logbook and evaluation from one place.
                    </p>

                    <a href="#internship-overview" class="btn btn-primary">
                        View Internship Progress
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <div class="welcome-icon">
                    <i class="fa-solid fa-user-graduate"></i>
                </div>

            </div>


            {{-- Internship Overview --}}
            <div class="dashboard-section" id="internship-overview">

                <div class="dashboard-section-title">
                    <div>
                        <h2>Internship Overview</h2>
                        <p>Quick overview of your internship progress.</p>
                    </div>
                </div>


                <div class="dashboard-stats">

                    <div class="stat-card">
                        <div class="stat-icon blue">
                            <i class="fa-regular fa-file-lines"></i>
                        </div>

                        <div>
                            <span class="stat-label">Application</span>
                            <h3>Not Submitted</h3>
                            <span class="status status-pending">
                                Pending
                            </span>
                        </div>
                    </div>


                    <div class="stat-card">
                        <div class="stat-icon green">
                            <i class="fa-solid fa-building"></i>
                        </div>

                        <div>
                            <span class="stat-label">Placement</span>
                            <h3>Not Assigned</h3>
                            <span class="status status-waiting">
                                Waiting
                            </span>
                        </div>
                    </div>


                    <div class="stat-card">
                        <div class="stat-icon purple">
                            <i class="fa-solid fa-book-open"></i>
                        </div>

                        <div>
                            <span class="stat-label">Logbook</span>
                            <h3>0 Entries</h3>
                            <span class="status status-progress">
                                Not Started
                            </span>
                        </div>
                    </div>


                    <div class="stat-card">
                        <div class="stat-icon orange">
                            <i class="fa-solid fa-star"></i>
                        </div>

                        <div>
                            <span class="stat-label">Evaluation</span>
                            <h3>Not Available</h3>
                            <span class="status status-pending">
                                Pending
                            </span>
                        </div>
                    </div>

                </div>

            </div>


            {{-- Main Dashboard Content --}}
            <div class="dashboard-content-grid">

                {{-- Internship Progress --}}
                <div class="dashboard-panel">

                    <div class="panel-header">
                        <div>
                            <h2>Internship Progress</h2>
                            <p>Complete each step of your internship.</p>
                        </div>

                        <i class="fa-solid fa-chart-line panel-header-icon"></i>
                    </div>


                    <div class="progress-list">

                        <div class="progress-item">

                            <div class="progress-circle current">
                                1
                            </div>

                            <div class="progress-info">
                                <h3>Internship Application</h3>
                                <p>
                                    Submit your internship application
                                    and required documents.
                                </p>
                            </div>

                            <a href="#" class="progress-action">
                                Apply
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>

                        </div>


                        <div class="progress-item">

                            <div class="progress-circle">
                                2
                            </div>

                            <div class="progress-info">
                                <h3>Application Approval</h3>
                                <p>
                                    Wait for your internship coordinator
                                    to review your application.
                                </p>
                            </div>

                            <span class="progress-disabled">
                                Locked
                            </span>

                        </div>


                        <div class="progress-item">

                            <div class="progress-circle">
                                3
                            </div>

                            <div class="progress-info">
                                <h3>Company Placement</h3>
                                <p>
                                    View your approved internship
                                    placement information.
                                </p>
                            </div>

                            <span class="progress-disabled">
                                Locked
                            </span>

                        </div>


                        <div class="progress-item">

                            <div class="progress-circle">
                                4
                            </div>

                            <div class="progress-info">
                                <h3>Internship & Logbook</h3>
                                <p>
                                    Record your daily activities
                                    throughout your internship.
                                </p>
                            </div>

                            <span class="progress-disabled">
                                Locked
                            </span>

                        </div>


                        <div class="progress-item">

                            <div class="progress-circle">
                                5
                            </div>

                            <div class="progress-info">
                                <h3>Evaluation</h3>
                                <p>
                                    View supervisor feedback and
                                    internship evaluation.
                                </p>
                            </div>

                            <span class="progress-disabled">
                                Locked
                            </span>

                        </div>

                    </div>

                </div>


                {{-- Quick Actions --}}
                <div class="dashboard-sidebar">

                    <div class="dashboard-panel">

                        <div class="panel-header">
                            <div>
                                <h2>Quick Actions</h2>
                                <p>Frequently used features.</p>
                            </div>
                        </div>


                        <div class="quick-actions">

                            <a href="#" class="quick-action">
                                <div class="quick-icon blue">
                                    <i class="fa-regular fa-file-lines"></i>
                                </div>

                                <div>
                                    <strong>Application</strong>
                                    <span>Submit internship application</span>
                                </div>

                                <i class="fa-solid fa-chevron-right"></i>
                            </a>


                            <a href="#" class="quick-action">
                                <div class="quick-icon purple">
                                    <i class="fa-solid fa-book-open"></i>
                                </div>

                                <div>
                                    <strong>My Logbook</strong>
                                    <span>Manage daily activities</span>
                                </div>

                                <i class="fa-solid fa-chevron-right"></i>
                            </a>


                            <a href="#" class="quick-action">
                                <div class="quick-icon green">
                                    <i class="fa-solid fa-building"></i>
                                </div>

                                <div>
                                    <strong>Placement</strong>
                                    <span>View company information</span>
                                </div>

                                <i class="fa-solid fa-chevron-right"></i>
                            </a>


                            <a href="#" class="quick-action">
                                <div class="quick-icon orange">
                                    <i class="fa-solid fa-star"></i>
                                </div>

                                <div>
                                    <strong>Evaluation</strong>
                                    <span>View your evaluation</span>
                                </div>

                                <i class="fa-solid fa-chevron-right"></i>
                            </a>

                        </div>

                    </div>


                    {{-- Help Card --}}
                    <div class="help-card">

                        <div class="help-icon">
                            <i class="fa-regular fa-circle-question"></i>
                        </div>

                        <div>
                            <h3>Need Help?</h3>

                            <p>
                                Contact your internship coordinator if
                                you need assistance with the system.
                            </p>

                            <a href="#">
                                Contact Coordinator
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>