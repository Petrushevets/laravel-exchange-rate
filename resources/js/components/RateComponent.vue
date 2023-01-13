<template>
    <div>
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>
                    <div @click="onSort('r030')" class="sorting">ID</div>
                    <div>
                        <input v-model="search.r030" @keyup.enter="onSearch" name="r030" type="text" placeholder="Search ID">
                    </div>
                </th>
                <th>
                    <div @click="onSort('txt')" class="sorting">Name</div>
                    <div>
                        <input v-model="search.txt" @keyup.enter="onSearch" name="txt" type="text" placeholder="Search Name">
                    </div>
                </th>
                <th>
                    <div @click="onSort('rate')" class="sorting">Rate</div>
                    <div>
                        <input v-model="search.rate" @keyup.enter="onSearch" name="rate" type="text" placeholder="Search Rate">
                    </div>
                </th>
                <th>
                    <div @click="onSort('cc')" class="sorting">Code</div>
                    <div>
                        <input v-model="search.cc" @keyup.enter="onSearch" name="cc" type="text" placeholder="Search Code">
                    </div>
                </th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="rate in rates">
                <td>{{ rate.r030 }}</td>
                <td>{{ rate.txt }}</td>
                <td>{{ rate.rate }}</td>
                <td>{{ rate.cc }}</td>
                <td>{{ rate.exchangedate }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "RateComponent",

    data() {
        return {
            rates: [],
            queriesSearch: '',
            queriesSort: '',
            search: {
                r030: '',
                txt: '',
                rate: '',
                cc: '',
            },
        }
    },

    mounted() {
        this.getRates()
    },

    methods: {
        getRates() {
            axios.get(`/api/rates?${this.queriesSort}${this.queriesSearch}`)
                .then(data => {
                    this.rates = data.data.data
                })
        },
        onSearch() {
            this.queriesSearch = Object.entries(this.$data.search).reduce((acc, [key, value]) => {
                if (value) {
                    return acc ? `${acc}&search[${key}]=${value}` : `search[${key}]=${value}`
                }

                return acc;
            }, '');

            this.getRates();
        },
        onSort(type) {
            if (this.queriesSort.includes(type)) {
                this.queriesSort = this.queriesSort.includes('asc') ? `desc=${type}&` : `asc=${type}&`;
            } else {
                this.queriesSort = `asc=${type}&`;
            }

            this.getRates();
        }
    }
}
</script>

<style scoped>
.sorting:before {
    right: 1em;
    content: "↑";
}

.sorting {
    cursor: pointer;
    position: relative;
}

.sorting:after {
    right: 0.5em;
    content: "↓";
}

.sorting:before,
.sorting:after {
    position: absolute;
    bottom: 0;
    display: block;
    font-size: 18px;
}

th {
    vertical-align: top;
}
</style>
