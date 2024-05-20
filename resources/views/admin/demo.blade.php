@extends('admin.main')
@section('title')
Demographic |  NSUK e-Voting System
@endsection
@section('subtitle')
Demographic | NSUK e-Voting System
@endsection


@section('content')

<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Demographic Filter Form -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Filter Results</h5>
                    </div>
                    <div class="card-body">
                        <form id="demographicFilterForm">
                            <div class="mb-3">
                                <label for="position" class="form-label">Position</label>
                                <select class="form-select" id="position">
                                    <option value="">All Positions</option>
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Apply Filter</button>
                        </form>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Election Results Chart -->
            <div class="col-md-8 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Election Results</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="electionResultsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var demographicFilterForm = document.getElementById('demographicFilterForm');
        var electionResultsChart = document.getElementById('electionResultsChart');
        var chart = null;

        // Function to fetch election results based on selected position
        function fetchElectionResults(position = '') {
            fetch('/api/election-results?position=' + position)
                .then(response => response.json())
                .then(data => {
                    var chartData = {
                        labels: data.candidates.map(candidate => candidate.fullname),
                        datasets: [{
                            label: 'Votes',
                            data: data.candidates.map(candidate => candidate.total_votes),
                            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40']
                        }]
                    };
                    renderChart(chartData);
                })
                .catch(error => console.error('Error fetching election results:', error));
        }

        // Function to render the election results chart
        function renderChart(data) {
            if (chart) {
                chart.destroy();
            }
            chart = new Chart(electionResultsChart, {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }
                }
            });
        }

        // Event listener for form submission
        demographicFilterForm.addEventListener('submit', function(event) {
            event.preventDefault();
            var selectedPosition = document.getElementById('position').value;
            fetchElectionResults(selectedPosition);
        });

        // Initial chart rendering
        fetchElectionResults();

        // Real-time updates (example using setInterval)
        setInterval(function() {
            var selectedPosition = document.getElementById('position').value;
            fetchElectionResults(selectedPosition);
        }, 5000); // Update every 5 seconds (adjust as needed)
    });
</script>

@endsection