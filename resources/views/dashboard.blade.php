<x-app-layout>

    <x-slot name="header">
        <div class="dashboard-header">

            <div>
                <p class="dashboard-eyebrow">STAFFHUB</p>

                <h2>Staff Dashboard</h2>

                <p class="dashboard-header-text">
                    Manage your profile, leave requests and workplace updates.
                </p>
            </div>


            <div class="dashboard-user">

                <div class="dashboard-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                <div>
                    <strong>{{ Auth::user()->name }}</strong>
                    <span>Staff</span>
                </div>

            </div>

        </div>
    </x-slot>


    <div class="dashboard-page">

        <div class="dashboard-container">


            {{-- =====================================================
                 WELCOME SECTION
            ===================================================== --}}
            <div class="welcome-card">

                <div class="welcome-content">

                    <span class="welcome-label">
                        <i class="fa-solid fa-user-tie"></i>
                        Staff Portal
                    </span>

                    <h1>
                        Welcome back, {{ Auth::user()->name }}!
                    </h1>

                    <p>
                        Manage your profile, submit leave requests
                        and stay updated with the latest workplace announcements.
                    </p>

                    <a href="#staff-overview" class="btn btn-primary">
                        View Overview
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>


                <div class="welcome-icon">
                    <i class="fa-solid fa-users"></i>
                </div>

            </div>



            {{-- =====================================================
                 STAFF OVERVIEW
            ===================================================== --}}
            <div class="dashboard-section" id="staff-overview">

                <div class="dashboard-section-title">

                    <div>
                        <h2>Staff Overview</h2>

                        <p>
                            Here's a quick overview of your account.
                        </p>
                    </div>

                </div>


                <div class="dashboard-stats">


                    {{-- Profile --}}
                    <div class="stat-card">

                        <div class="stat-icon blue">
                            <i class="fa-regular fa-user"></i>
                        </div>

                        <div>
                            <span class="stat-label">My Profile</span>

                            <h3>Profile Information</h3>

                            <span class="status status-progress">
                                Active
                            </span>
                        </div>

                    </div>



                    {{-- Leave Balance --}}
                    <div class="stat-card">

                        <div class="stat-icon green">
                            <i class="fa-regular fa-calendar-check"></i>
                        </div>

                        <div>
                            <span class="stat-label">Leave Balance</span>

                            <h3>8 Days</h3>

                            <span class="status status-waiting">
                                Available
                            </span>
                        </div>

                    </div>



                    {{-- Pending Leave --}}
                    <div class="stat-card">

                        <div class="stat-icon purple">
                            <i class="fa-regular fa-clock"></i>
                        </div>

                        <div>
                            <span class="stat-label">Leave Request</span>

                            <h3>1 Pending</h3>

                            <span class="status status-pending">
                                Pending
                            </span>
                        </div>

                    </div>



                    {{-- Announcement --}}
                    <div class="stat-card">

                        <div class="stat-icon orange">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>

                        <div>
                            <span class="stat-label">Announcements</span>

                            <h3>3 New</h3>

                            <span class="status status-progress">
                                Updates
                            </span>
                        </div>

                    </div>

                </div>

            </div>



            {{-- =====================================================
                 MAIN DASHBOARD CONTENT
            ===================================================== --}}
            <div class="dashboard-content-grid">


                {{-- Recent Leave Requests --}}
                <div class="dashboard-panel">

                    <div class="panel-header">

                        <div>
                            <h2>Recent Leave Requests</h2>

                            <p>
                                Track your latest leave applications.
                            </p>
                        </div>

                        <i class="fa-regular fa-calendar panel-header-icon"></i>

                    </div>



                    <div class="progress-list">


                        {{-- Leave 1 --}}
                        <div class="progress-item">

                            <div class="progress-circle current">
                                <i class="fa-solid fa-plane"></i>
                            </div>

                            <div class="progress-info">

                                <h3>Annual Leave</h3>

                                <p>
                                    15 October 2026 • 2 Days
                                </p>

                            </div>

                            <span class="status status-pending">
                                Pending
                            </span>

                        </div>



                        {{-- Leave 2 --}}
                        <div class="progress-item">

                            <div class="progress-circle">
                                <i class="fa-solid fa-notes-medical"></i>
                            </div>

                            <div class="progress-info">

                                <h3>Medical Leave</h3>

                                <p>
                                    2 September 2026 • 1 Day
                                </p>

                            </div>

                            <span class="status status-waiting">
                                Approved
                            </span>

                        </div>



                        {{-- Leave 3 --}}
                        <div class="progress-item">

                            <div class="progress-circle">
                                <i class="fa-regular fa-calendar"></i>
                            </div>

                            <div class="progress-info">

                                <h3>Annual Leave</h3>

                                <p>
                                    10 August 2026 • 1 Day
                                </p>

                            </div>

                            <span class="status status-progress">
                                Completed
                            </span>

                        </div>

                    </div>


                    <a href="#"
                       class="progress-action"
                       style="margin-top: 15px;">

                        View Leave History

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>



                {{-- =====================================================
                     SIDEBAR
                ===================================================== --}}
                <div class="dashboard-sidebar">


                    {{-- Quick Actions --}}
                    <div class="dashboard-panel">

                        <div class="panel-header">

                            <div>
                                <h2>Quick Actions</h2>

                                <p>
                                    Frequently used features.
                                </p>
                            </div>

                        </div>


                        <div class="quick-actions">


                            {{-- Profile --}}
                            <a href="#" class="quick-action">

                                <div class="quick-icon blue">
                                    <i class="fa-regular fa-user"></i>
                                </div>

                                <div>
                                    <strong>My Profile</strong>
                                    <span>View and update your details</span>
                                </div>

                                <i class="fa-solid fa-chevron-right"></i>

                            </a>



                            {{-- Apply Leave --}}
                            <a href="#" class="quick-action">

                                <div class="quick-icon green">
                                    <i class="fa-solid fa-calendar-plus"></i>
                                </div>

                                <div>
                                    <strong>Apply Leave</strong>
                                    <span>Submit a new leave request</span>
                                </div>

                                <i class="fa-solid fa-chevron-right"></i>

                            </a>



                            {{-- Leave History --}}
                            <a href="#" class="quick-action">

                                <div class="quick-icon purple">
                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                </div>

                                <div>
                                    <strong>Leave History</strong>
                                    <span>View your leave requests</span>
                                </div>

                                <i class="fa-solid fa-chevron-right"></i>

                            </a>



                            {{-- Announcement --}}
                            <a href="#" class="quick-action">

                                <div class="quick-icon orange">
                                    <i class="fa-solid fa-bullhorn"></i>
                                </div>

                                <div>
                                    <strong>Announcements</strong>
                                    <span>View workplace updates</span>
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
                                Contact the administrator if you need
                                assistance with your account or the system.
                            </p>

                            <a href="#">
                                Contact Admin
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>