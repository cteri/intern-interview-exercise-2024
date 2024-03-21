<template>
    <div class="container">
        <report-chart></report-chart>
        <div>
            <a class="btn btn-primary" href="/" role="button">Back to Search Page</a>
        </div>
        <report-detail :orders="orders"></report-detail>
    </div>
</template>

<script>

import ReportChart from "./ReportChart.vue";
import ReportDetail from "./ReportDetail.vue";

export default {
    name: "ReportParent",
    components: {ReportDetail, ReportChart},
    data() {
        return {
            orders: window.Laravel.orders
        };
    }
}

</script>

<style scoped>

</style>
