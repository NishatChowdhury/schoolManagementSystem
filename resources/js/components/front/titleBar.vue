<template>
    <div>
        <section class="" data-primary-overlay="0" :style="'background-color:'+title.bg_color+';'">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 text-center d-md-flex align-items-center">
                        <div class="navbar-brand">
<!--                            <a class="logo-default" :href="'/'"><img alt="" :src="'http://'+asset+'/assets/img/logos/'+title.logo" width="75" height="75"></a>-->
                            <a class="logo-default" :href="asset">
                                <img alt="" :src="'/assets/img/logos/'+title.logo" :height="title.logo_height">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-10 text-blue text-center">
                        <h2 class="mb-4">
                            <span :style="'color:'+title.name_color+';font-size:'+title.name_size+'px;font-family:'+title.name_font+';'">{{ title.name }}</span><br>
                            <span :style="'color:'+title.bn_color+';font-size:'+title.bn_size+'px;font-family:'+title.bn_font+';'">{{ title.bn }}</span>
                        </h2>
                    </div>
                </div> <!-- END row-->
            </div> <!-- END container-->
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            title : [],
            asset : location.host,
        }
    },
    created() {
        this.axios
            //.get('http://'+location.host+'/api/title-bar')
            .get('/api/title-bar')
            .then(response => {
                this.title = response.data;
                console.log(response.data)
            });
    }
}
</script>
