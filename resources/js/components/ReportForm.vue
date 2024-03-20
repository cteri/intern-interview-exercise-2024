<template>
    <div className="container">
        <div className="py-5 text-center">
            <h2>Retail Store ABC</h2>
            <p className="lead">Report generation screen</p>
        </div>

        <hr className="my-4">

        <form className="needs-validation" noValidate="" @submit.prevent="onSubmit">
            <div className="row g-3">
                <div className="col-12">
                    <div className="input-group">
                        <div className="col-md-2">
                            <label htmlFor="orderDateRange" className="form-label">Order date range</label>
                        </div>
                        <div className="col-md-5">
                            <label htmlFor="startDate" className="form-label">Start from: </label>
                            <input type="date" className="form-control" id="startDate" placeholder="yyyy/mm/dd" required="">
                        </div>
                        <div className="col-md-5">
                            <label htmlFor="endDate" className="form-label">End to: </label>
                            <input type="date" className="form-control" id="endDate" placeholder="yyyy/mm/dd" required="">
                        </div>
                    </div>
                </div>

                <div className="col-12">
                    <div className="input-group">
                        <label htmlFor="productCategory" className="form-label col-md-2">Product category</label>
                        <div className="d-flex">
                            <div className="form-check me-3">
                                <input type="checkbox" className="form-check-input" id="categoryA">
                                <label className="form-check-label" htmlFor="categoryA">A</label>
                            </div>
                            <div className="form-check me-3">
                                <input type="checkbox" className="form-check-input" id="categoryB">
                                <label className="form-check-label" htmlFor="categoryB">B</label>
                            </div>
                            <div className="form-check">
                                <input type="checkbox" className="form-check-input" id="categoryC">
                                <label className="form-check-label" htmlFor="categoryC">C</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="col-12">
                    <div className="input-group">
                        <label htmlFor="minOrderTotal" className="form-label col-md-2">Minimum order total</label>
                        <input type="number" className="form-control" id="minOrderTotal" min="0"
                               placeholder="Enter minimum order total" required="">
                    </div>
                </div>
            </div>

            <hr className="my-4">

            <button className="w-100 btn btn-primary" type="submit">Generate Report</button>
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
            categoryA: false,
            categoryB: false,
            categoryC: false,
            minOrderTotal: null
        };
    },
    methods: {
        onSubmit() {
            if (!this.startDate && !this.endDate && !this.categoryA && !this.categoryB && !this.categoryC && this.minOrderTotal === null) {
                alert('Please select at least one parameter to generate the report.');
                return;
            }
            if (this.startDate && this.endDate && this.startDate > this.endDate) {
                alert('Start date must be before end date.');
                return;
            }

            // todo submit
            alert('Report generation is in progress!');
        }
    }
}
</script>
