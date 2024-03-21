<template>
    <div class="container center-container">
        <div class="py-5 text-center">
            <h2>Retail Store ABC</h2>
            <p class="lead">Report generation screen</p>
        </div>

        <hr class="my-4">

        <form class="needs-validation" ref="form" action="/report" method="get" noValidate="" @submit.prevent="onSubmit">
            <div class="row g-3">
                <div class="col-12">
                    <div class="input-group">
                        <div class="col-md-2">
                            <label htmlFor="orderDateRange" class="form-label">Order date range</label>
                        </div>
                        <div class="col-md-5">
                            <label htmlFor="startDate" class="form-label">Start from: </label>
                            <input type="date" class="form-control" id="startDate" placeholder="yyyy/mm/dd" required="" name="startDate">
                        </div>
                        <div class="col-md-5">
                            <label htmlFor="endDate" class="form-label">End to: </label>
                            <input type="date" class="form-control" id="endDate" placeholder="yyyy/mm/dd" required="" name="endDate">
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="input-group">
                        <label htmlFor="productCategory" class="form-label col-md-2">Product category</label>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input type="checkbox" class="form-check-input" id="categoryA" name="categories[]" value="A">
                                <label class="form-check-label" htmlFor="categoryA">A</label>
                            </div>
                            <div class="form-check me-3">
                                <input type="checkbox" class="form-check-input" id="categoryB" name="categories[]" value="B">
                                <label class="form-check-label" htmlFor="categoryB">B</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="categoryC" name="categories[]" value="C">
                                <label class="form-check-label" htmlFor="categoryC">C</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="input-group">
                        <label htmlFor="minOrderTotal" class="form-label col-md-2">Minimum order total</label>
                        <input type="number" class="form-control" id="minOrderTotal" min="0"
                               placeholder="Enter minimum order total" name="minOrderTotal" required="">
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary" type="submit">Generate Report</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "ReportForm",
    data() {
        return {
            startDate: '',
            endDate: '',
        };
    },
    methods: {
        onSubmit() {
            if (this.startDate && this.endDate && this.startDate > this.endDate) {
                alert('Start date must be before end date.');
                return;
            }

            this.$refs.form.submit();
        },
    }
}
</script>
