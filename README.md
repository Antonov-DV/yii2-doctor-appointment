# yii2-doctor-appointment
backend для хранения заявок на прием к врачу. 

Заявка должна содержать поля: Ф, И, О, email, интересующая специализация врача (справочник: терапевт, хирург, педиатр), научная степень врача (справочник: специалист, кандидат наук, доктор наук), описание проблемы, желаемая дата приема (должна быть больше текущей), флаг "заявка оплачена" (по умолчанию = false).

В содержимом админ-панель и REST API для работы приложения.

- Справочники заполняются из админки и доступны для получения через API.
- Заявки создются через API, просматриваются через админку, а так же в админке есть возможность выставления флага "заявка оплачена".
- Есть возможность вбивать из аминки перевод для пунктов справочников (ru/en), хранение переводов универсальное для возможности быстро подключать туда другие типовые справочники (id, значение)
- Есть указания необходимого языка при запросе справочника через API
