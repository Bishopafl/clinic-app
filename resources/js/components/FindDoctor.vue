<template>
    <div>
        {{time}}
        {{doctors}}
        <div class="card">
            <div class="card-header">Find Doctors</div>
            <div class="card-body">
                <datepicker class="my-datepicker" calendar-class="my-datepicker_calendar" :format="customDate" v-model="time" :inline="true"></datepicker>
            </div>
            
        </div>

        <div class="card">
            <div class="card-header">Doctors</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                             <th>#</th>
                             <th>Photo</th>
                             <th>Name</th>
                             <th>Expertise</th>
                             <th>Booking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(d,index) in doctors" :key="d.doctor.id">
                            <td>{{index+1}}</td>
                            <td>
                                <img :src="'/images/'+ d.doctor.image" width="80px">
                            </td>
                            <td>{{ d.doctor.name }}</td>
                            <td>{{ d.doctor.department }}</td>
                            <td>
                                <a :href="'/new-appointment/'+d.user_id+'/'+d.date">
                                    <button class="btn btn-success">
                                        Book Appointment
                                    </button>
                                </a>
                            </td>
                            <td v-if="doctors.length==0">No doctors available for {{this.time}}</td>
                        </tr>
                    </tbody>
                </table>
         
            </div>
        </div>

    </div>
</template>
<script type="text/javascript">
    import datepicker from 'vuejs-datepicker';
    import moment from 'moment';
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
    export default {
        data() {
            return {
                time:'',
                doctors:[]
            }
        },
        components:{
            datepicker,
            PulseLoader
        },
        methods:{
            customDate(date) {    
                time = moment(date).format('YYYY-MM-DD');
                console.log(time);

                axios.post('/api/finddoctors',{date:time}).then((response)=>{
                    this.doctors = response.data
                }).catch((error)=>{alert('error')});
            }
        },
        mounted(){
            axios.get('/api/doctors/today').then((response)=>{
                this.doctors = response.data
            });
        }
    }
</script>
<style scoped>
    .my-datepicker >>> .my-datepicker_calendar{
        width: 100%;
        height: 330px;
    }
</style>