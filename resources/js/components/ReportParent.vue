<template>
    <div class="container">
        <report-chart></report-chart>
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
