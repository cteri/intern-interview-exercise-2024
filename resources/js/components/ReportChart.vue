<template>
    <Bar :data="chartData" />
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
                labels: window.Laravel.chartOptions,
                datasets: [
                    {
                        label: 'Data One',
                        backgroundColor: '#f87979',
                        data: window.Laravel.chartData
                    }
                ]
            }
        }
    }
}
</script>
