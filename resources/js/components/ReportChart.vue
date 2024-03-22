<template>
    <div class="chart-container">
        <Bar :data="chartData"/>
    </div>
</template>

<script>
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
    name: 'ReportChart',
    components: { Bar },
    data() {
        return {
            chartData: {
                labels: JSON.parse(window.chartOptions),
                datasets: [
                    {
                        label: 'Category',
                        backgroundColor: '#f87979',
                        data: JSON.parse(window.chartData),
                    }
                ]
            }
        }
    }
}
</script>
