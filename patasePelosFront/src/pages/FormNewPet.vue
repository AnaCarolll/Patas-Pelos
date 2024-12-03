<template>
  <q-page padding id="fundoDaPagina" class="">
<div class="my-fonty">
  <h4>
    Cadastrar Pet
  </h4>
</div>
   <q-form class="q-pa-md flex flex-column items-center justify-center">

      <div class="q-pa-md flex flex-column items-center col-12 col-md-6" id="fundoFormulario">
        <q-input model-value="" label="Nome" outlined class="q-mb-md full-width" />
        <q-input mask="##/##/####" model-value="" label="Data de Nascimento" outlined class="q-mb-md full-width">
          <template v-slot:append>
            <q-icon name="event" class="cursor-pointer">
              <q-popup-proxy>
                <q-date model-value="bornDate" mask="DD/MM/yyyy" />
              </q-popup-proxy>
            </q-icon>
          </template>
        </q-input>
        <q-select model-value="" label="Espécie" outlined class="q-mb-md full-width" :options="['Cachorro', 'Gato', 'Outro']" />
        <q-btn label="Cadastrar" class="buttonCadastrar q-mt-md" />
      </div>
    </q-form>
  </q-page>


</template>



<script lang="ts">
import { defineComponent } from 'vue';
export default defineComponent({
})
</script>
<style>

.buttonCadastrar{
  background-color: #ffffff;
  display: flex;
  justify-content: center;
  margin:0 auto;
  width: 200px;
}
.my-fonty {
  color: #ffffff;
  text-align: center;
  font-family: "Itim", serif;
  font-weight: 400;
  font-style: normal;
  font-size: 390px;
}

#fundoFormulario {
  background-color: rgba(255, 255, 255, 0.4); /* Cor branca com 80% de opacidade */
  height: 400px;
  width: 400px;
  border-radius: 30px;
}
#fundoDaPagina{
  background-color:#6781E6;
}
</style>
<script setup lang="ts">
</script>
