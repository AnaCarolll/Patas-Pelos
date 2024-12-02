<template>
  <q-page padding>
    <q-form>
      <div class="row q-mb-md">
      <q-input model-value="" class="col-8" label="Nome" outlined />
      </div>
      <div class="row q-col-gutter-x-md">
      <q-input class="col-8 q-mb-md" model-value="" label="Data de Nascimento" outlined >
        <template v-slot:append>
          <q-icon name="event" class="cursor-pointer">
            <q-popup-proxy>
              <q-date model-value=""/>
            </q-popup-proxy>
          </q-icon>
        </template>
      </q-input>
      <q-select class="col-8 q-mb-md" model-value=""
                label="Especie"
                outlined
                :options="[
                  'Cachorro',
                  'Gato',
                  'Outro'
                ]"
      />
      </div>
    <div class="col-8">
      <q-btn label="Cadastrar"/>
    </div>

    </q-form>
  </q-page>
</template>
<script lang="ts">
import { defineComponent } from 'vue';
export default defineComponent({
})
</script>
