/**
 * Dashboard chart initialization
 */
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all charts on the dashboard
    initializeCharts();
});

/**
 * Initialize all charts
 */
function initializeCharts() {
    // Initialize each chart type
    initializeParticipantChart('datawl', 'Wisata Luar Negeri');
    initializeParticipantChart('datajh', 'Jamaah Haji');
    initializeParticipantChart('datawd', 'Wisata Domestik');
    initializeParticipantChart('dataju', 'Jamaah Umrah');
}

/**
 * Initialize a participant chart
 * @param {string} chartId - The ID of the chart element
 * @param {string} title - Title for the chart
 */
function initializeParticipantChart(chartId, title) {
    // Fetch data from the server
    fetch(`/api/chart/${chartId}`)
        .then(response => response.json())
        .then(data => {
            renderParticipantChart(chartId, title, data);
        })
        .catch(error => {
            console.error(`Error loading chart data for ${chartId}:`, error);
        });
}

/**
 * Render participant chart with the provided data
 * @param {string} chartId - The ID of the chart element
 * @param {string} title - Title for the chart
 * @param {Object} data - Chart data from API
 */
function renderParticipantChart(chartId, title, data) {
    const months = Object.keys(data.monthly);
    const values = Object.values(data.monthly);
    
    const options = {
        series: [{
            name: 'Pendaftaran',
            data: values
        }],
        chart: {
            type: 'area',
            height: 250,
            toolbar: {
                show: false
            }
        },
        title: {
            text: title,
            align: 'left'
        },
        subtitle: {
            text: `Total: ${data.total} peserta`,
            align: 'left'
        },
        xaxis: {
            categories: months,
        },
        stroke: {
            curve: 'smooth',
        },
        colors: ['#5CC1F3'],
        dataLabels: {
            enabled: false
        },
        tooltip: {
            y: {
                formatter: function(value) {
                    return value + " pendaftar";
                }
            }
        },
    };

    // Create and render the chart
    const chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
    chart.render();
    
    // Create gender distribution pie chart if applicable
    if (data.gender && document.querySelector(`#${chartId}-gender`)) {
        renderGenderChart(`${chartId}-gender`, data.gender);
    }
}

/**
 * Render gender distribution pie chart
 * @param {string} chartId - The ID of the chart element
 * @param {Object} data - Gender distribution data
 */
function renderGenderChart(chartId, data) {
    const options = {
        series: [data.male, data.female],
        chart: {
            type: 'pie',
            width: 150,
            height: 150,
        },
        labels: ['Laki-laki', 'Perempuan'],
        colors: ['#5CC1F3', '#FF6384'],
        legend: {
            show: false
        },
        dataLabels: {
            enabled: true
        },
    };

    const chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
    chart.render();
}
