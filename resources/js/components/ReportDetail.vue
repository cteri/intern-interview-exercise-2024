<template>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Product ID</th>
            <th scope="col">Order Total</th>
            <th scope="col">Order Date</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer ID</th>
            <th scope="col">Birthday</th>
            <th scope="col">Phone Number</th>
        </tr>
        </thead>
        <tbody>
        <!-- Repeat this table row for each order -->
        <tr v-for="order in orders.data" :key="orders.data.orderID">
            <td>{{ order.orderID }}</td>
            <td>{{ order.productID }}</td>
            <td>{{ order.orderTotal }}</td>
            <td>{{ order.orderDate }}</td>
            <td>{{ order.FirstName }} {{ order.LastName }}</td>
            <td>{{ order.customerID }}</td>
            <td>{{ order.BirthDate }}</td>
            <td>{{ order.PhoneNumber }}</td>
        </tr>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li v-for="link in orders.links" :key="link.label" :class="{'page-item': true, 'active': link.active}">
                <a v-if="link.url" :href="link.url" class="page-link" v-html="link.label"></a>
                <span v-else class="page-link" v-html="link.label"></span>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "ReportDetail",
    props: ['orders'],
}
</script>

<style scoped>

</style>
